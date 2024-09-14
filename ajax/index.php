<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container mt-5">
        <h1 class="alert-info text-center mb-5 p-3">
            AJAX--PHP--JS&Bootstrap-5
        </h1>
        <h2>
            <div id="msg">
                <p></p>
            </div>
        </h2>
        <div class="row">
            <form action="" class="col-sm-5" id="myform">
                <h3 class="alert-warning text-center p-2">
                    Add / Update Students
                </h3>
                <div>
                    <input style="display:none;" type="text" class="form-control" id="stuid" value="">
                    <label for="nameid" class="form-label">name</label>
                    <input type="text" class="form-control" id="nameid" required>
                </div>
                <div>
                    <label for="emailid" class="form-label">email</label>
                    <input type="email" class="form-control" id="emailid"required>
                </div>
                <div>
                    <label for="passwordid" class="form-label">password</label>
                    <input type="email" class="form-control" id="passwordid"required>
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn btn-primary" id="btnadd">save</button>
                </div>
                <div id="msg"></div>
            </form>
            <div class="col-sm-7 text-center">
                <h3 class="alert-warning p-2">
                    Show Student Infooo
                </h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">PASSWORD</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
    // Show data on page load
    shodata();
    document.querySelector('#btnadd').addEventListener('click', addstd);

    // Add or update student data
    function addstd(e) {
        e.preventDefault();
        let stdinputid = document.querySelector('#stuid').value;
        let name = document.querySelector('#nameid').value;
        let email = document.querySelector('#emailid').value;
        let password = document.querySelector('#passwordid').value;

        // Validate inputs (optional, add validation rules here)

        let fdata = {
            id: stdinputid,
            name: name,
            email: email,
            password: password
        };
        let datajson = JSON.stringify(fdata);

        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'test.php', true);
        xhr.onload = function () {
            if (this.status === 200) {
                document.querySelector('#myform').reset(); // Reset form after submission
                shodata(); // Refresh data
            } else {
                document.querySelector('#msg').innerHTML = 'Error in adding/updating data';
            }
        };
        xhr.send(datajson);
    }

    // Show all student data
    let tdata = document.querySelector('#tbody');
    function shodata() {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', 'apage.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                let data = JSON.parse(xhr.responseText);
                let table = '';
                data.forEach(element => {
                    table += `<tr>
                        <td>${element.id}</td>
                        <td>${element.usernames}</td>
                        <td>${element.emails}</td>
                        <td>${element.passwords}</td>
                        <td><button id='${element.id}' onclick='edit(this)' class='btn btn-info'>Edit</button></td>
                        <td><button id='${element.id}' onclick='del(this)' class='btn btn-danger'>Delete</button></td>
                    </tr>`;
                });
                tdata.innerHTML = table;
            } else {
                document.querySelector('#msg').innerHTML = 'Error loading data';
            }
        };
        xhr.send();
    }

    // Delete a student
    function del(btn) {
        let mid = btn.getAttribute('id');
        let wxhr = new XMLHttpRequest();
        wxhr.open('POST', 'del.php', true);
        wxhr.onload = function () {
            if (wxhr.status === 200) {
                document.querySelector('#msg').innerHTML = 'Delete successful';
                shodata(); // Refresh data
            } else {
                alert('Connection error');
            }
        };
        let std = { id: mid };
        let midjson = JSON.stringify(std);
        wxhr.send(midjson);
    }

    // Edit student data
    function edit(btn) {
        let stdid = btn.getAttribute('id');
        let wxhr = new XMLHttpRequest();
        wxhr.open('POST', 'edit.php', true);
        wxhr.onload = function () {
            if (wxhr.status === 200) {
                let datafid = JSON.parse(wxhr.responseText);

                // Fill the form with fetched data for editing
                document.querySelector('#stuid').value = datafid.id;
                document.querySelector('#nameid').value = datafid.usernames;
                document.querySelector('#emailid').value = datafid.emails;
                document.querySelector('#passwordid').value = datafid.passwords;
            } else {
                alert('Error in fetching data');
            }
        };
        let std = { id: stdid };
        let datajson = JSON.stringify(std);
        wxhr.send(datajson);
    }
</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>