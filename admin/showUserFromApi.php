<!DOCTYPE html>
<html>

<head>
  <title>User List</title>
  <style>
    #jsonTable {
      border: 1px solid black;
      margin: 0 auto;
      /* Center the table horizontally */
    }

    #jsonTable th,
    #jsonTable td {
      padding: 8px;
      border: 1px solid black;
    }

    #jsonTable thead th {
      font-weight: bold;
    }

    #jsonTable tbody tr:nth-child(even) {
      background-color: #f2f2f2;
      /* Alternate row background color */
    }

    #jsonTable tbody tr:hover {
      background-color: #ddd;
      /* Hover row background color */
    }
  </style>
</head>

<body>
  <table id="jsonTable" style="border: 1px solid black">
 
    <thead>
       <tr>
       <th style="text-align: center;" colspan="7"><h1>Registred user list</h1></br><h4>Fetched from rest api</h4></th>
       </tr>
      <tr>
        
        <th>ID</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Rating</th>
        <th>Review</th>
        <th>DateOfBirth</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>

  <script>
    // Fetch JSON data from the API
    fetch('http://localhost/ES/api/get.php')
      .then(response => response.json())
      .then(data => {
        // Get the table body element
        const tableBody = document.querySelector('#jsonTable tbody');

        // Iterate over the JSON data and create table rows
        data.forEach(item => {
          const row = document.createElement('tr');

          // Create table cells for each data field
          const idCell = document.createElement('td');
          idCell.textContent = item.user_id;
          row.appendChild(idCell);

          const nameCell = document.createElement('td');
          nameCell.textContent = item.name;
          row.appendChild(nameCell);

          const userNameCell = document.createElement('td');
          userNameCell.textContent = item.username;
          row.appendChild(userNameCell);

          const emailCell = document.createElement('td');
          emailCell.textContent = item.email;
          row.appendChild(emailCell);

          const ratingCell = document.createElement('td');
          ratingCell.textContent = item.rating;
          row.appendChild(ratingCell);

          const reviewCell = document.createElement('td');
          reviewCell.textContent = item.review;
          row.appendChild(reviewCell);

          const DateOfBirth = document.createElement('td');
          DateOfBirth.textContent = item.DateOfBirth;
          row.appendChild(DateOfBirth);

          // Append the row to the table body
          tableBody.appendChild(row);
        });
      })
      .catch(error => {
        console.error('Error:', error);
      });
  </script>
</body>

</html>