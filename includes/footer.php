<?php
/*
*	File:   footer.php
*	By:     Shaelyn Ellis
*	Date:   03-01-2014
*
*	This script acts as footer to entire site, 
*       included on almost every page. I simply reused this, 
*       though I additionally commented it out due to date weirdness. 
*
*=====================================
*/
?>

<br />
<br />

</div>	<!-- close content -->

<div id="footer">

    <p>
        <?php
        // This is curious. Time is not accurate, and set to European time
        echo date("F j, Y, g:i a");
        echo "<br />&copy; ".date("Y")." All Rights Reserved.";
        if($page_title == 'Search for members'){
            echo "<p class='search'>
                <a href='index.php'><< return to Home</a>
                </p>";
        }
        ?>
    </p>

</div>	<!-- end footer -->
</div> <!-- end wrapper -->
</body>
</html>