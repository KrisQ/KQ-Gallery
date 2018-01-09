</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

     <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Views',     <?php echo $session->count; ?>],
          ['Photos',      <?php echo Photo::count_all(); ?>],
          ['Users',  <?php echo User::count_all(); ?>],
          ['Comments', <?php echo Comment::count_all(); ?>],
          
        ]);

        var options = {
     title: 'title',
     legendTextStyle: { color: '#FFF' },
    titleTextStyle: { color: '#FFF' },
    backgroundColor: '#303030',
};

         

    

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
     <script src="js/plugins/scripts.js"></script>

</body>

</html>
