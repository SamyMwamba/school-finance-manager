<?php include_once 'menuleft.php';?>
    <section id="content">


<!--start container-->
        <div class="container">
            <div class="section">


                <!--card stats start-->
                <div id="card-stats" class="seaction">


                    <div class="row">

                        <div class="col s12 m6 l3">
                            <div class="card">
                                <div class="card-content  green white-text">
                                    <p class="card-stats-title"><i class="mdi-social-group-add"></i> Total eleve</p>
                                    <h4 class="card-stats-number" id="totaleleve"></h4>
                                    <p class="card-stats-compare">
                                    </p>
                                </div>
                                <div class="card-action  green darken-2">

                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l3">
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

                    <div class="row">
                        <div class="row">
                            <div class="col l3"><input type="text" id="searchpaie" placeholder="recherche automatique"/></div>
                            <div class="col l3"><select id="data2" class="browser-default"><option>Choisir motif</option></select></div>
                            <div class="col l3"><input type="text" placeholder="annee" id="annee"></div>
                            <div class="col l3">
                                <select id="classe" class="browser-default">
                                    <option>Classe</option>
                                </select>
                            </div>

                        </div>
                        <div class="card card-mini">
                            <div class="card-body no-padding table-responsive">
                                <table    class="table card-table" >
                                    <thead>
                                    <tr>
                                        <th>Num</th>
                                        <th>Date</th>
                                        <th>Montant</th>
                                        <th>Eleve</th>
                                        <th>Motif</th>
                                        <th>Observation</th>
                                        <th>Statut</th>

                                    </tr>
                                    </thead>
                                    <tbody id="tbody">


                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
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
            <input type="text" id="search" placeholder="recherche"/>
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
    <div id="modal2" class="modal">
        <div class="modal-content">
            <input type="text" id="search" placeholder="recherche"/>
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
            <input type="text" id="search" placeholder="recherche"/>
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
            <input type="text" id="search" placeholder="recherche"/>
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