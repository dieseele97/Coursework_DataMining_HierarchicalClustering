<?php
set_include_path('jpgraph\src');
require_once('jpgraph.php');
require_once('jpgraph_line.php');
require_once('jpgraph_bar.php');
session_start(); 
$ydata=$_SESSION['ydata'];

$graph = new Graph(1000,800);
$graph->SetScale("textlin",0,$aYMax=5);
$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);
$graph->title->Set('Dendrogram');
$graph->ygrid->Show(false);
$graph->xgrid->Show(true);
$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
$graph->SetBackgroundGradient('white', '#55eeff', GRAD_HOR, BGRAD_PLOT);
$graph->xaxis->SetTickLabels(array('0','1','2','3','4','5','6'));
$p1 = new LinePlot($ydata);
$p1->SetFillColor('green');
$p1->SetStepStyle();
$graph->Add($p1);
$p1->value->SetFont(FF_ARIAL,FS_BOLD,10);
$p1->value->SetAlign('top');
$p1->value->SetFormat('%0.3f');
$p1->value->Show();
$graph->xaxis->title->Set("X-title");
$graph->yaxis->title->Set("Y-title");
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->Stroke();
?>

