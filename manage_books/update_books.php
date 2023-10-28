<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f7f7f7;
    }

    h1,
    h2 {
      text-align: center;
    }

    #header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px;
      background-color: #003366;
      color: white;
      width: auto;
      position: sticky;
      top: 0;
      z-index: 1000;
    }
    #navigation {
        /* Navigation styles */
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px;
        background-color: #f7f7f7;
        color: white;
        width: auto;
        position: sticky;
        top: 0;
        z-index: 100;
        /* Lower z-index for navigation */
        }

    #img_left,
    #img_right {
      flex: 0 0 auto;
    }

    #img_left img,
    #img_right img {
      max-width: 100%;
      height: auto;
    }

    #title {
      flex: 1 1 auto;
      text-align: center;
      margin: 0;
    }

    #section {
      text-align: center;
      padding: 20px 0;
    }

    .btn-group1 {
      display: flex;
      justify-content: center;
      border-radius: 4px;
    }

    .btn-group1 button {
      background-color: #003366;
      color: #fff;
      border: none;
      padding: 10px 20px;
      margin: 0 10px;
      cursor: pointer;
      font-size: 16px;
      border-radius: 4px;
    }

    .btn-group1 button:hover {
      background-color: #6a819c;
    }

    #update-user-btn.active {
      background-color: #03213f;
    }
  </style>
  <title>Delete Data From Database in Php</title>
</head>

<body>
<header>
    <div id="header">
      <div id="img_left">
        <img src="../img/uoh_logo_white.png" alt="University of Hyderabad">
      </div>
      <div id="title">
            <h1><b>School of Computer and Information Sciences</b></h1>
            <h2><b>Library Books / Journals Indenting System</b></h2>            
        </div>
      <div id="img_right">
        <img src="../img/uoh_ioe_white.png" alt="University of Hyderabad">
      </div>
    </div>
  </header>

  <div id="navigation" class="btn-group1">
    <!-- Your button links here -->
    <button onclick="window.location.href='../adding_books.html'">Add New Books</button>
    <button onclick="window.location.href='update_books.php'" id="update-user-btn">Update Books</button>
    <button onclick="window.location.href='delete_books.php'">Delete Book</button>
    <button onclick="window.location.href='search_books.php'">Search Book</button>
    <button onclick="window.location.href='../admin1.php'">Logout</button>
  </div>
  <!--<body class="bg-dark">-->
  <div class="container">
    <div class="row mt-5">
      <div class="col">
        <div class="card mt-5">
          <div class="card-header">
            <h2 class="display-6 text-center">Data From Database</h2>
          </div>
          <div class="card-body">
            <table class="table table-bordered text-center">
              <tr class="bg-dark text-white">
              <td> Book Name </td>
                <td> Author </td>
                <td> Edition </td>
                <td> ISBN Number </td>
                <td> Publisher </td>
                <td> Year of Publication </td>
                <td> Cost </td>
                <td> Field </td>
                <td> Edit </td>
                <td> Delete </td>
              </tr>
              <tr>
                <?php
                require_once 'config/db1.php';
                $query = "select * from add_new_books";
                $data = mysqli_query($con, $query);
                $total = mysqli_num_rows($data);

                if ($total != 0) {
                  while ($result = mysqli_fetch_assoc($data)) {
                    echo "
                        <tr>
                        <td>" . $result['book_name'] . "</td>
                        <td>" . $result['author'] . "</td>
                        <td>" . $result['edition'] . "</td>
                        <td>" . $result['isbn'] . "</td>
                        <td>" . $result['publisher'] . "</td>
                        <td>" . $result['year'] . "</td>
                        <td>" . $result['cost'] . "</td>
                        <td>" . $result['field'] . "</td>

                        <td><a href='update.php?book_name=$result[book_name],author=$result[author],edition=$result[edition],publisher=$result[publisher],year=$result[year],cost=$result[cost],field=$result[field]&isbn=$result[isbn]' class='btn btn-primary'>Edit</a></td>  
                        <td><a href='delete.php?isbnnum=$result[isbn]' onclick='return checkdelete()' class='btn btn-danger'>Delete</a></td>
                        </tr>
                        ";
                  }
                } else {
                  echo "No records found";
                }
                ?>

            </table>
            <script>
              function checkdelete() {
                return confirm('Are you sure want to Delete this Record');
              }
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>