<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Data API</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Covid Data API</h1>
        <div id="dataTable"></div>
        <button id="loadData" class="btn btn-primary mt-3">Load Data from API</button>
    </div>

    <script>
        document.getElementById('loadData').addEventListener('click', function() {
            fetch('/api/covid-data?limit=10') // Mengambil 10 data dari API
                .then(response => response.json())
                .then(data => {
                    const dataTable = document.getElementById('dataTable');
                    dataTable.innerHTML = ''; // Hapus konten sebelumnya

                    // Tampilkan data dalam bentuk tabel
                    let table = '<table class="table table-bordered"><thead><tr><th>Date</th><th>Location</th><th>Total Cases</th><th>Total Deaths</th><th>Total Recovered</th><th>Province</th></tr></thead><tbody>';
                    data.data.forEach(item => {
                        table += `<tr>
                                    <td>${item.date}</td>
                                    <td>${item.location}</td>
                                    <td>${item.total_cases}</td>
                                    <td>${item.total_deaths}</td>
                                    <td>${item.total_recovered}</td>
                                    <td>${item.province}</td>
                                  </tr>`;
                    });
                    table += '</tbody></table>';
                    dataTable.innerHTML = table;
                })
                .catch(error => console.error('Error fetching data:', error));
        });
    </script>
</body>
</html>