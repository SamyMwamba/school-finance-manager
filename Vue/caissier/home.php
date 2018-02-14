<?php include_once 'menuleft.php';?>
    <section id="content">


        <!--start container-->
        <div class="container">
            <div class="section">


                <!--card stats start-->
                <div id="card-stats" class="seaction">


                    <div class="row">

                        <div class="col s12 m6 l6">
                            <a href="#modal1">
                            <div class="card">
                                <div class="card-content  green white-text">
                                    <p class="card-stats-title"><i class="mdi-social-group-add mdi-5x"></i></p>
                                    <p>Paiement</p>
                                    <h4 class="card-stats-number" id=""></h4>
                                    <p class="card-stats-compare">
                                    </p>
                                </div>
                                <div class="card-action  green darken-2">

                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col s12 m6 l6">
                            <a href="#modal2">
                                <div class="card">
                                    <div class="card-content purple white-text">
                                        <p class="card-stats-title"><i class="mdi-editor-attach-money mdi-5x"></i></p>
                                        <p>Versement</p>
                                        <h4 class="card-stats-number" id=""></h4>
                                        <p class="card-stats-compare">                                    </p>
                                    </div>
                                    <div class="card-action purple darken-2">


                                    </div>

                                </div>
                            </a>
                        </div>

                        <div class="col s12 m6 l6">
                            <a href="#modal3">
                                <div class="card">
                                    <div class="card-content green white-text">
                                        <p class="card-stats-title"><i class="mdi-action-book mdi-5x"></i></p>
                                        <p>Vente</p>
                                        <h4 class="card-stats-number" id=""></h4>
                                        <p class="card-stats-compare">                                    </p>
                                    </div>
                                    <div class="card-action green darken-2">


                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="col s12 m6 l6">
                            <a href="#modal4">
                                <div class="card">
                                    <div class="card-content purple white-text">
                                        <p class="card-stats-title"><i class="mdi-social-group mdi-5x"></i></p>
                                        <p>Eleve</p>
                                        <h4 class="card-stats-number" id=""></h4>
                                        <p class="card-stats-compare">                                    </p>
                                    </div>
                                    <div class="card-action purple darken-2">


                                    </div>

                                </div>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="row col l6">
                    <h5 class="card card-mini">PRIX ET MOTIF</h5>

                    <div class="card card-mini col l6">

                        <div class="card-body no-padding table-responsive">
                            <table    class="table card-table" >
                                <thead>
                                <tr>
                                    <th>Motif</th>
                                    <th>Prix</th>


                                </tr>
                                </thead>
                                <tbody id="tbodyprix">
                                <tr><td>salut</td></tr>


                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
                <!--card stats end-->


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
                <div class="card-body no-padding table-responsive center-align">
                    <a href="addpaie.php" class="btn green center-align">Nouveau paiement</a>
                    <a href="showpaie.php" class="btn red center-align">Afficher paiement</a>

                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>


    <!-- Modal Structure -->
    <div id="modal2" class="modal">
        <div class="modal-content">
            <div class="card card-mini">
                <div class="card-body no-padding table-responsive">


                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>



    <!-- Modal Structure -->
    <div id="modal3" class="modal">
        <div class="modal-content">
            <div class="card card-mini">
                <div class="card-body no-padding table-responsive">


                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="modal4" class="modal">
        <div class="modal-content">
            <div class="card card-mini">
                <div class="card-body no-padding table-responsive">


                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>


<?php include_once 'footer.php';?>