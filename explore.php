<?php

    /*
    ########################### DMU-Net.org ##########################

    * Maintainer: Jonathan DEKHTIAR
    * Date: 2017-05-17
    * Contact: contact@jonathandekhtiar.eu
    * Twitter: https://twitter.com/born2data
    * LinkedIn: https://fr.linkedin.com/in/jonathandekhtiar
    * Personal Website: http://www.jonathandekhtiar.eu
    * RSS Feed: https://www.feedcrunch.io/@dataradar/
    * Tech. Blog: http://www.born2data.com/
    * Github: https://github.com/DEKHTIARJonathan

    *******************************************************************

     2017 May 17

     In place of a legal notice, here is a blessing:

        May you do good and not evil.
        May you find forgiveness for yourself and forgive others.
        May you share freely, never taking more than you give.

    *******************************************************************
    */

    require_once "parts/header.php";
?>
    <!-- header -->
    <div class="container content">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-3">DMU-Net Explorer</h1>
                <p class="lead">Feel free to explore and visualise the dataset in 3D.</p>
                <p style="font-size: 16px;">
                    The quality of the CAD model has been highly decreased in the web browsing. The primary objective was to allow anyone, even with a slow connection, to explore smoothly the DMU-Net Dataset.
                </p>
            </div>
        </div>

        <section id="dataset-explorater" class="features section" style="padding:0px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 scrolling-vert-panel" id="Category-List">
                        <table class="table tree">
                            <tr>
                                <td><b>Available Categories</b>
                                </td>
                            </tr>

                            <?php
                                $stmt = $pdo->prepare("select * from `Part_Categories` order by `name`;");
                                $stmt->execute();
                                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                $i = 1;

                                foreach ($result as $row){
                                    echo '<tr class="treegrid-'.$i.'">';
                                    echo '<td class="part-category" data-id="'.$i.'" data-category="'.$row["name"].'">'.$row["name"].'</td>';
                                    echo '</tr>';
                                    $i++;
                                }
                            ?>

                            <!--
                            <tr class="treegrid-2 treegrid-parent-1">
                                    <td>Node 1-1</td>
                            </tr>
                            <tr class="treegrid-3 treegrid-parent-1">
                                    <td>Node 1-2</td>
                            </tr>
                            <tr class="treegrid-4 treegrid-parent-3">
                                    <td>Node 1-2-1</td>
                            </tr>
                            -->
                        </table>
                    </div>
                    <div class="col-md-9 scrolling-vert-panel" id="target-viz">
                        <i>Please select a category in the list on left.</i>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="3D-visualiser" tabindex="-1" role="dialog" aria-labelledby="3D-visualiserLabel" style="z-index:1200">
        <div class="modal-dialog modal-lg" role="document" style="width: calc(100vw - 50px);">
            <div class="modal-content" style="height: calc(100vh - 50px);">
                <div class="modal-header"> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 32px;">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="3D-visualiserLabel">3D Model Visualiser</h4>
                </div>
                <div class="modal-body" id="3D-Viz-Body" style="height: calc(100% - 130px);"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php
        require_once "parts/footer.php";
    ?>
