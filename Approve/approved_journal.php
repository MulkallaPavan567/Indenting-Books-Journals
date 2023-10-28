<!--DOCTYPE html>
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
    #create-user-button.active {
      background-color: #03213f;
    }
  </style>
  <title>Data From Database</title>
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

  <div id="section" align="left" class="btn-group1">       
        <button onclick="window.location.href='select_book.php'">Select Books</button>
        <button onclick="window.location.href='select_journal.php'">Select Journals</button>
        <button onclick="window.location.href='suggest_books.html'">Suggest Books</button>
        <button onclick="window.location.href='suggest_journals.html'">Suggest Journals</button>
        <button onclick="window.location.href='edit_profile.html'">Edit Profile</button>
        <button onclick="window.location.href='../faculty.php'">Logout</button>
    </div>
  
  <div class="container">
    <div class="row mt-5">
      <div class="col">
        <div class="card mt-5">
          <div class="card-header">
            <h2 class="display-6 text-center">Select and Suggest Journals</h2>
          </div>
          <div class="card-body">
            <table class="table table-bordered text-center">
              <tr class="bg-dark text-white">
                <td> Journal Name </td>
                <td> Journal Number </td>
                <td> Publisher </td>
                <td> Year of Publication </td>
                <td> Field </td>
                
                <td> Suggest </td>
              </tr>
              <tr>
                <?php
                /*require_once 'config/db1.php';
                $query = "select * from journals";
                $data = mysqli_query($con, $query);
                $total = mysqli_num_rows($data);

                if ($total != 0) {
                  while ($result = mysqli_fetch_assoc($data)) {
                    echo "
                        <tr>
                        <td>" . $result['journalName'] . "</td>
                        <td>" . $result['journalNumber'] . "</td>
                        <td>" . $result['publisher'] . "</td>
                        <td>" . $result['year'] . "</td>
                        <td>" . $result['field'] . "</td>

                        <td>
                            <a href='add_suggested_journal.php?
                                journalName=" . urlencode($result["journalName"]) . "&
                                journalNumber=" . urlencode($result["journalNumber"]) . "&
                                publisher=" . urlencode($result["publisher"]) . "&
                                year=" . urlencode($result["year"]) . "&
                                field=" . urlencode($result["field"]) . "'
                                class='btn btn-success'>Suggest
                            </a>
                        </td>
                        </tr>
                        ";
                  }
                } else {
                  echo "No records found";
                }
                */ ?>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
      justify-content: space between;
      padding: 20px;
      background-color: #003366;
      color: white;
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

    #create-user-button.active {
      background-color: #03213f;
    }
  </style>
  <title>Approve Journals</title>

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

  <div id="section" align="left" class="btn-group1">
    <button onclick="window.location.href='approved_book.php'">Approve Books</button>
    <button onclick="window.location.href='approved_journal.php'">Approve Journals</button>
    <button onclick="window.location.href='../admin1.php'">Logout</button>
  </div>

  <div class="container">
    <div class="row mt-5">
      <div class="col">
        <div class="card mt-5">
          <div class="card-header">
            <h2 class="display-6 text-center">Select and Suggest Journals</h2>
          </div>
          <div class="card-body">
            <table class="table table-bordered text-center" id="bookTable">
              <tr class="bg-dark text-white heading-row">
                <td> Journal Name </td>
                <td> Journal Number </td>
                <td>
                  <select id="publisherFilter">
                    <option value="">All publishers</option>
                    <?php
                    require_once 'config/db1.php';
                    $query = "SELECT DISTINCT publisher FROM suggested_journals";
                    $publisherData = mysqli_query($con, $query);
                    while ($publisher = mysqli_fetch_assoc($publisherData)) {
                      echo "<option value='" . htmlspecialchars($publisher['publisher']) . "'>" . htmlspecialchars($publisher['publisher']) . "</option>";
                    }
                    ?>
                  </select>
                  <button onclick="filterTable1()">Filter</button>
                </td>
                <td>
                  <select id="yearSortDirection">
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                  </select>
                  <button onclick="sortTable()">Sort</button>
                </td>
                <td>
                  <select id="fieldFilter">
                    <option value="">All Fields</option>
                    <?php
                    require_once 'config/db1.php';
                    $query = "SELECT DISTINCT field FROM suggested_journals";
                    $fieldData = mysqli_query($con, $query);
                    while ($field = mysqli_fetch_assoc($fieldData)) {
                      echo "<option value='" . htmlspecialchars($field['field']) . "'>" . htmlspecialchars($field['field']) . "</option>";
                    }
                    ?>
                  </select>
                  <button onclick="filterTable()">Filter</button>
                </td>
                <td> Suggest </td>
              </tr>
              <?php
              require_once 'config/db1.php';
              $query = "SELECT * FROM suggested_journals";
              $data = mysqli_query($con, $query);
              $total = mysqli_num_rows($data);

              if ($total != 0) {
                while ($result = mysqli_fetch_assoc($data)) {
                  echo "
                        <tr>
                          <td>" . $result['journalName'] . "</td>
                          <td>" . $result['journalNumber'] . "</td>
                          <td>" . $result['publisher'] . "</td>
                          <td>" . $result['year'] . "</td>
                          <td>" . $result['field'] . "</td>
                          <td>
                            <input type='checkbox' class='suggested-journal-checkbox' data-journal='" . htmlentities(json_encode($result)) . "'>
                          </td>
                        </tr>
                       ";
                }
              } else {
                echo "<tr><td colspan='6'>No records found</td></tr>";
              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="text-center mt-3">
    <button id="suggestJournalsButton" class="btn btn-success" type="button">Approve Selected Journals</button>
  </div>

  <script>
    function sortTable() {
      var table, rows, switching, i, x, y, shouldSwitch;
      table = document.getElementById('bookTable');
      switching = true;
      while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < rows.length - 1; i++) {
          shouldSwitch = false;
          x = rows[i].getElementsByTagName('td')[3]; // 3 is the index of the Year column
          y = rows[i + 1].getElementsByTagName('td')[3]; // 3 is the index of the Year column
          var direction = document.getElementById('yearSortDirection').value;
          if ((direction === 'asc' && parseInt(x.textContent) > parseInt(y.textContent)) ||
            (direction === 'desc' && parseInt(x.textContent) < parseInt(y.textContent))) {
            shouldSwitch = true;
            break;
          }
        }
        if (shouldSwitch) {
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
        }
      }
    }

    function filterTable() {
      var selectedField = document.getElementById('fieldFilter').value.toLowerCase();
      $('#bookTable tr').each(function() {
        if (!$(this).hasClass('heading-row')) { // Exclude heading row
          var fieldCell = $(this).find('td:eq(4)').text().toLowerCase(); // 7 is the index of the Field column
          if (selectedField === '' || fieldCell === selectedField) {
            $(this).show();
          } else {
            $(this).hide();
          }
        }
      });
    }

    function filterTable1() {
      var selectedpublisher = document.getElementById('publisherFilter').value.toLowerCase();
      $('#bookTable tr').each(function() {
        if (!$(this).hasClass('heading-row')) { // Exclude heading row
          var publisherCell = $(this).find('td:eq(2)').text().toLowerCase(); // 4 is the index of the Field column
          if (selectedpublisher === '' || publisherCell === selectedpublisher) {
            $(this).show();
          } else {
            $(this).hide();
          }
        }
      });
    }

    $(document).ready(function() {
      // Handle the click event of the "Suggest Selected Journals" button
      $("#suggestJournalsButton").on("click", function() {
        var selectedJournals = [];
        $(".suggested-journal-checkbox:checked").each(function() {
          var journalData = $(this).data("journal");
          selectedJournals.push(journalData);
        });

        // Check if at least one journal is selected
        if (selectedJournals.length === 0) {
          alert("No journals selected for suggestion.");
          return; // Prevent form submission
        }

        // Send the selected journals to the server for processing
        $.ajax({
          type: "POST",
          url: "process_approved_journals.php", // Update the URL accordingly
          data: {
            approved_journals: JSON.stringify(selectedJournals) // Convert to JSON string
          },
          success: function(response) {
            // Handle the response from the server, e.g., display a success message
            alert(response);
            // You can redirect to another page or perform other actions as needed.
          },
          error: function(xhr, status, error) {
            // Handle errors here
            alert("Error: " + xhr.responseText);
          }
        });
      });
    });
  </script>
</body>

</html>
