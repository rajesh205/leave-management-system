import React, { useEffect, useState } from "react";
import axios from "axios";

const API_URL = "http://localhost:8000/api";

function App() {
  const [employees, setEmployees] = useState([]);
  const [leaveData, setLeaveData] = useState({
    employee_id: "",
    start_date: "",
    end_date: "",
    reason: "",
  });
  const [message, setMessage] = useState("");

  useEffect(() => {
    axios.get(\`\${API_URL}/employees\`).then((res) => setEmployees(res.data));
  }, []);

  const handleLeaveRequest = () => {
    axios
      .post(\`\${API_URL}/leave-requests\`, leaveData)
      .then(() => setMessage("Leave request submitted"))
      .catch(() => setMessage("Failed to submit leave"));
  };

  return (
    <div style={{ padding: 20 }}>
      <h1>Employees</h1>
      <ul>
        {employees.map((e) => (
          <li key={e.id}>
            {e.name} ({e.email}) - {e.department}
          </li>
        ))}
      </ul>

      <h2>Request Leave</h2>
      <select
        value={leaveData.employee_id}
        onChange={(e) => setLeaveData({ ...leaveData, employee_id: e.target.value })}
      >
        <option value="">Select Employee</option>
        {employees.map((e) => (
          <option key={e.id} value={e.id}>
            {e.name}
          </option>
        ))}
      </select>
      <br />
      <input
        type="date"
        value={leaveData.start_date}
        onChange={(e) => setLeaveData({ ...leaveData, start_date: e.target.value })}
      />
      <br />
      <input
        type="date"
        value={leaveData.end_date}
        onChange={(e) => setLeaveData({ ...leaveData, end_date: e.target.value })}
      />
      <br />
      <textarea
        placeholder="Reason"
        value={leaveData.reason}
        onChange={(e) => setLeaveData({ ...leaveData, reason: e.target.value })}
      />
      <br />
      <button onClick={handleLeaveRequest}>Submit Leave Request</button>

      {message && <p>{message}</p>}
    </div>
  );
}

export default App;
