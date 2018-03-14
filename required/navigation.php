<div class="wrapper">
	<div class="container" style="padding: 0 30px; background-image: linear-gradient(to bottom,#fe8f0e 0,#FF9821 100%);">
		<div class="site-navigation clearfix">
			<ul>
				<li><a href="/pages/due_loans.php">Due Loans</a></li>
				<li><a href="/pages/cus_search.php">Search Customer</a></li>
				<li><a href="/pages/new_reg.php">New Customer</a></li>
				<li><a href="/pages/edit_search.php">Edit Customer</a></li>
				<li><a href="/pages/loan_new.php">New Loan</a></li>
				<li><a href="/pages/payment_new.php">Payment</a></li>
				<li><a href="/pages/reports.php">Reports</a></li>
				<li style="float:right;"><a href='/php/logout.php'>Log Out</a></li>
			</ul>
		</div>
	</div>
</div>
<script>
var selector = '.site-navigation li';
    var url = window.location.href;
    var target = url.split('/pages/');
     $(selector).each(function(){
        if($(this).find('a').attr('href')===('/pages/'+target[target.length-1])){
          $(selector).removeClass('active');
          $(this).addClass('active');
        }
     });
</script>