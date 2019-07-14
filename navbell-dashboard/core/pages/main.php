<?php
$count = post("count","","");
$topUsers = post("topusers","","");
$challenges=post("getchlng","","");
/**************************************************************************/
/*    COLUMN CHART top 10 player by number solved challenge               */
/**************************************************************************/
  
    // Chart Configuration stored in Associative Array
    $arrChartConfig = array(
        "chart" => array(
            "caption" => "Top 10 Player ",
            "subCaption" => "Rank of users by solved challenges",
            "xAxisName" => "Students",
            "yAxisName" => "Challenges",
            "numberSuffix" => "",
            "theme" => "fusion"
        )
    );
    // An array of hash objects which stores data
    $arrChartData = array();
   

    for($i=0;$i<10;$i++){

        array_push($arrChartData, array($topUsers[$i]->fname,$topUsers[$i]->nbsolved));
    }
    //print_r($arrChartData);
    $arrLabelValueData = array();

    // Pushing labels and values
    for($i = 0; $i < count($arrChartData); $i++) {
        array_push($arrLabelValueData, array(
            "label" => $arrChartData[$i][0], "value" => $arrChartData[$i][1]
        ));
    }

    $arrChartConfig["data"] = $arrLabelValueData;

    // JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
    $jsonEncodedData = json_encode($arrChartConfig);

    // chart object
    $Chart = new FusionCharts("column2d", "MyFirstChart" , "700", "400", "b1", "json", $jsonEncodedData);

    // Render the chart
/**************************************************************************/
/*    PIE CHART challenges by year                                       */
/**************************************************************************/



$arrPieConfig = array(
        "chart" => array(
            "animateClockwise"=> "1",
            "caption" => "Challenges Online",
            
            "showlegend"=> "1",
            "showpercentvalues"=> "1",
            "legendposition"=> "bottom",
            "usedataplotcolorforlabels"=>"1",
            "theme"=> "fusion"
        )
    );

$cpi1 = $cpi2 = $cs1 = $cs2 = $cs3 = 0;
foreach ($challenges as $challenge) {
            if($challenge->isAproved ==1){
            switch ($challenge->year) {
                case '1':
                    $cpi1 +=1;
                    break;
                case '2':
                    $cpi2 +=1;
                    break;
                case '3':
                    $cs1+=1;
                    break;
                case '4':
                    $cs2+=1;
                    break;
                case '5':
                    $cs3+=1;
                    break;
            
            
       } 
    }

}
$arrPieConfig["data"] = array(
        array("label"=>"First Preparatory Year ","value"=>"$cpi1"),
        array("label"=>"Second Preparatory Year","value"=>"$cpi2"),
        array("label"=>"First Superieur Year","value"=>"$cs1"),
        array("label"=>"Second Superieur Year","value"=>"$cs2"),
        array("label"=>"Third Superieur Year","value"=>"$cs3")      
    );

$json = json_encode($arrPieConfig);
$pie = new FusionCharts("pie2d", "ex1", "100%", 400, "b2", "json",$json);
?>


<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $count->alladm ; ?></h2>
                                                <span>Administration </span>
                                            </div>

                                        </div>
                                        <div class="overview-chart">
                                             <div class="text-center">
                                          <p>Administrators : <span class="badge badge-primary"><?php echo $count->administrators;?></span><br>
                                           Enseignant : <span class="badge badge-primary"> <?php echo ($count->alladm - $count->administrators) ;?></span></p>
                                       </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $count->allstudents ; ?></h2>
                                                <span>All allstudents</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                             <div class="text-center">
                                          <p>Subscribed : <span class="badge badge-primary"><?php echo $count->users;?></span><br>
                                           Unsubscribed : <span class="badge badge-primary"> <?php echo ($count->allstudents - $count->users) ;?></span></p>
                                       </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                               <i class="fas fa-table"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $count->challenges ; ?></h2>
                                                <span>Challenges</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                             <div class="text-center">
                                          <p>Online : <span class="badge badge-primary"><?php echo $count->provedchallenges;?></span><br>
                                           Offline : <span class="badge badge-primary"> <?php echo ($count->challenges - $count->provedchallenges) ;?></span></p>
                                       </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                         <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-calendar-alt"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $count->rewards?></h2>
                                                <span>Rewards</span>
                                            </div>
                                        </div>
                                          <div class="overview-chart">
                                            
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>


<?php
$pie->render();
?>
<div class="col-lg-6">
<div class="au-card m-b-30">
<div id="b2"></div>
</div>
</div>
<?php
$Chart->render();
?>
<div class="col-lg-6">
<div class="au-card m-b-30">
<div id="b1"></div>
</div>
</div>
    
