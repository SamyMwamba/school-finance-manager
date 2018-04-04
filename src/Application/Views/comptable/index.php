<?php include_once 'menuleft.php';?>
    <section id="content">


        <!--start container-->
        <div class="container">
            <div class="section ">


                <!--card stats start-->
                <div id="card-stats" class="seaction center">


                    <div class="row center center-align" style="min-height: 550px">
                        <div class="offset-l3"></div>
                        <div class="col s12 m6 l3 offset-l3 center ">
                            <a href="#modal2">
                            <div class="card">
                                <div class="card-content  green white-text">
                                    <p class="card-stats-title"><i class="mdi-social-group-add"></i> Total Versement</p>
                                    <h4 class="card-stats-number" id="montanttotalvers"></h4>
                                    <p class="card-stats-compare">
                                    </p>
                                </div>
                                <div class="card-action  green darken-2">

                                </div>
                            </div>
                        </a>
                        </div>
                        <div class="col s12 m6 l3 center center-align ">
                            <a href="#modal1">
                                <div class="card">
                                    <div class="card-content purple white-text">
                                        <p class="card-stats-title"><i class="mdi-editor-attach-money"></i>Total Montant</p>
                                        <h4 class="card-stats-number" id="montanttotal"></h4>
                                        <p class="card-stats-compare">                                    </p>
                                    </div>
                                    <div class="card-action purple darken-2">


                                    </div>

                                </div>
                            </a>
                        </div>


                    </div>
                </div>
                <!--card stats end-->

                <!-- //////////////////////////////////////////////////////////////////////////// -->
                <div class="divider"></div>

                <!--chart dashboard end-->

                <!-- //////////////////////////////////////////////////////////////////////////// -->
                <div class="divider"></div>
                <!--card widgets start-->

                <!--card widgets end-->

                <!-- //////////////////////////////////////////////////////////////////////////// -->
                <div class="divider"></div>
                <!--work collections start-->
                <div id="work-collections" class="seaction">


                    <!-- Floating Action Button -->

                    <!-- Floating Action Button -->
                </div>
                <!--work collections end-->

            </div>
        </div>
        <!--end container-->

    </section>
    <!-- END CONTENT -->


    <!-- LEFT RIGHT SIDEBAR NAV-->

    </div>
    <!-- END WRAPPER -->

    </div>


    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">

            <div class="card card-mini">
                <div class="card-body no-padding table-responsive center center-align">
                    <a href="showpaie.php" class="btn center-align">Afficher</a>


                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Fermer</a>
        </div>
    </div>


    <!-- Modal Structure -->
    <div id="modal2" class="modal">
        <div class="modal-content">

            <div class="card card-mini">
                <div class="card-body no-padding table-responsive center center-align">

                    <a href="showvers.php" class="btn center-align">Afficher</a>

                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Fermer</a>
        </div>
    </div>




<?php include_once 'footer.php';?>