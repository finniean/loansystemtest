<div>
  <table>
    
    <?php
require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');
      $loanhis = "SELECT * FROM `loans` WHERE `loan_date` BETWEEN 'Feb/01/2018' AND 'Mar/31/2018' ORDER BY `loan_date` DESC";
      $loanhistory = mysqli_query($link, $loanhis);

      if (mysqli_num_rows($loanhistory)> 0) {
        echo "
          <h1 align='center'>SME Loan System Loans History Report</h1>
          <h3 align='center'>Date From: </h3>
          <tr class='resultslabel'>
            <th>Loan ID</th>
            <th>Customer ID</th>
            <th>Loan Amount</th>
            <th>Loan Date</th>
            <th>Due Date</th>
          </tr>";
      while($row = mysqli_fetch_assoc($loanhistory)) {
      echo "
        <tr class='resultsrow'>
          <td>" . $row["loan_id"] . "</td>
          <td>" . $row["customer_id"] . "</td>
          <td>₱ " . $row["loan_amount"] . "</td>
          <td>" . $row["loan_date"] . "</td>
          <td>" . $row["due_date"] . "</td>
        </tr>";
      }
    }
?>

  </table>
</div>
