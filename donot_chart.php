<!--// Assuming $con is your MySQL connection-->
<?php
include("includes/connection.php");
$query = "SELECT session, program, COUNT(*) AS student_count 
          FROM stduent_roll_list 
          WHERE program IN ('BSC', 'BS-IT', 'SE') 
          GROUP BY session, program order by session asc";
$result = mysqli_query($con, $query);
//if($result){
//	
//	echo("yes woring");
//	
//}
//else{
//	echo(mysqli_errno($con));
//}

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[$row['session']] = $row['student_count'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session-wise Student Counts</title>
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <style>
        .bar {
            fill: steelblue;
        }

        .bar:hover {
            fill: orange;
        }

        .axis-x text {
            font-size: 14px;
        }

        .axis-y text {
            font-size: 14px;
        }

        .axis-y .tick line {
            display: none;
        }
    </style>
</head>
<body>
    <svg id="sessionChart" width="800" height="400"></svg>

    <script>
        var data = <?php echo json_encode($data); ?>;
        
        const margin = { top: 20, right: 30, bottom: 50, left: 60 };
        const width = 800 - margin.left - margin.right;
        const height = 400 - margin.top - margin.bottom;

        const svg = d3.select("#sessionChart")
                      .attr("width", width + margin.left + margin.right)
                      .attr("height", height + margin.top + margin.bottom)
                      .append("g")
                      .attr("transform", `translate(${margin.left},${margin.top})`);

        const x = d3.scaleBand()
                    .domain(Object.keys(data))
                    .range([0, width])
                    .padding(0.1);

        const y = d3.scaleLinear()
                    .domain([0, d3.max(Object.values(data))])
                    .range([height, 0]);

        svg.append("g")
           .attr("class", "axis-x")
           .attr("transform", `translate(0,${height})`)
           .call(d3.axisBottom(x))
           .selectAll("text")
           .attr("transform", "rotate(-45)")
           .style("text-anchor", "end");

        svg.append("g")
           .attr("class", "axis-y")
           .call(d3.axisLeft(y));

        svg.selectAll(".bar")
           .data(Object.entries(data))
           .enter().append("rect")
           .attr("class", "bar")
           .attr("x", d => x(d[0]))
           .attr("width", x.bandwidth())
           .attr("y", d => y(d[1]))
           .attr("height", d => height - y(d[1]));

    </script>
</body>
</html>
