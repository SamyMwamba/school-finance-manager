<!-- END MAIN -->



<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- START FOOTER -->
<footer class="page-footer">
    <div class="footer-copyright">
        <div class="container">
            <span>Copyright © 2017 <a class="grey-text text-lighten-4" href="http://.net/user//portfolio?ref=" target="_blank"></a> All rights reserved.</span>
            <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="http://.com/"></a></span>
        </div>
    </div>
</footer>
<!-- END FOOTER -->



<!-- ================================================
Scripts
================================================ -->

<!-- jQuery Library -->
<script type="text/javascript" src="../js/jquery-3.1.0.min.js"></script>
<!--materialize js-->
<script type="text/javascript" src="../js/materialize.js"></script>
<script type="text/javascript" src="../js/init.js"></script>

<!--prism-->
<script type="text/javascript" src="../js/plugins/prism/prism.js"></script>
<!--scrollbar-->
<script type="text/javascript" src="../js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<!-- chartjs -->
<script type="text/javascript" src="../js/plugins/chartjs/chart.min.js"></script>


<!-- sparkline -->
<script type="text/javascript" src="../js/plugins/sparkline/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="../js/plugins/sparkline/sparkline-script.js"></script>



<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="../js/plugins.min.js"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="../js/custom-script.js"></script>
<script src="../js/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    } );
</script>

<script>
    $(document).ready(function () {
        $.ajax({

            url:'http://devpay.biz/lagrace/Controlleur/controlleurprix.php',
            method:'POST',
            data:{intitule1:'intitule1'},
            success:function (result) {

                $("#data").append(result);

            }
        });
        eleve();
        montanttotal();
        montanttotalvers();




    });

</script>

<script>
    $(document).ready(function () {
        $.ajax({

            url:'http://devpay.biz/lagrace/Controlleur/controlleurprix.php',
            method:'POST',
            data:{intitule2:'intitule2'},
            success:function (result) {
                $("#data2").append(result);
                // alert(result);
            }
        });


    });

</script>

<script>
    $(document).ready(function () {
        var objet=$("#matricule");
        objet.keyup(function () {

            var matricule=objet.val();

            $.ajax({
                url:'http://devpay.biz/lagrace/Controlleur/controlleureleve.php',
                method:'POST',
                data:{verifiemat:'verifiemat',matricule:matricule},
                success:function (result) {
                    if(result!=';') {
                        var tab=result.split(';');
                        $("#matricule").css({'color':'green'});
                        $("#nom").val(tab[0]);
                        $("#postnom").val(tab[1]);

                    }
                    else
                    {
                        $("#matricule").css({'color':'red'});
                        $("#nom").val('INCONNU');
                        $("#postnom").val('INCONNU');

                    }

                }
            })
        })
    });
</script>
<script>
    $(document).ready(function () {
        $("#btn_enr_paie").click(function () {


            var matriculeajout=$("#matricule").val();
            var montantajout=$("#montant").val();
            var motifajou=$("#data").val();
            var tab=motifajou.split(':');
            var motifajout=tab[0];

            var anneeajout=$("#annee").val();
            var observationajout=$("#observationajout").val();
            var status=$("#status").val();



            $.ajax({
                url:'http://devpay.biz/lagrace/Controlleur/controlleurpaie.php',
                method:"POST",
                data:{insertnew:'insertnew',observationajout:observationajout,matriculeajout:matriculeajout,montantajout:montantajout,motifajout:motifajout,anneeajout:anneeajout,status:status},
                success:function (result) {

                    Materialize.toast(result,2000);
                    Materialize.toast(status,2000);



                }
            })
        });
    });
</script>

<script>
    $(document).ready(function() {

        $("#btn_dec").click(function () {
            $.ajax({
                method: "POST",
                url: "http://devpay.biz/lagrace/Controlleur/controlleurgerant.php",
                data: {deconnexion:'deconnexion'},
                success: function (result) {
                    if(result=='true')
                    {
                        window.location.replace('http://devpay.biz/lagrace/vue/dist/html/pages/user-login.php');

                    }
                    else
                    {
                        alert('Probleme de deconnexion');


                    }

                }
            });


        });


        $.ajax({
            url :"http://devpay.biz/lagrace/Controlleur/controlleureleve.php",
            method: "post",
            data:{classe:'classe'},
            success:function (result) {
                $("#classe").append(result);




            },
            error: function(){
                $("#classe").append('<tbody class="employee-grid-error"><tr><th colspan="3">Aucune donnee trouvee</th></tr></tbody>');

            }

        });


    });


</script>

<script>
    $(document).ready(function () {
        var objet=$("#classe");
        objet.change(function () {
            var val=objet.val();

            $.ajax({
                url :"http://devpay.biz/lagrace/Controlleur/controlleurpaie.php",
                method:'post',
                data:{classepaie:'classepaie',val:val},
                success:function (result) {
                    var tab=result.split(';');
                    var result1=tab[0];
                    var result2=tab[1];
                    $("#tbody").html(result1);
                    $("#montanttotal").html(result2);
                },
                error: function(){
                    $("#tbody").append('<tbody class="employee-grid-error"><tr><th colspan="3">Aucune donnee trouvee</th></tr></tbody>');

                }

            })
        })
    })
</script>

<script>

    function montanttotal() {

        $.ajax({
            method: "POST",
            url: "http://devpay.biz/lagrace/Controlleur/controlleurpaie.php",
            data: {montanttotal:'montanttotal'},
            success: function (result) {
                if(result)

                    $("#montanttotal").html(result);


            }

        });


    }
    function montanttotalvers() {

        $.ajax({
            method: "POST",
            url: "http://devpay.biz/lagrace/Controlleur/controlleurversement.php",
            data: {montanttotalvers:'montanttotalvers'},
            success: function (result) {
                if(result)

                    $("#montanttotalvers").html(result);


            }

        });


    }

    function totalmontantdejapaye() {

        $.ajax({
            method: "POST",
            url: "http://devpay.biz/lagrace/Controlleur/controlleurpaie.php",
            data: {dejapaye:'dejapaye'},
            success: function (result) {
                if(result)

                    $("#dejapaye").html(result);



            }

        });

    }




    function eleve() {
        $.ajax({
            method: "POST",
            url: "http://devpay.biz/lagrace/Controlleur/controlleureleve.php",
            data: {elevetotal:'elevetotal'},
            success: function (result) {
                if(result)

                    $("#totaleleve").html(result);

            }

        });

    }

    function dernierpaiment() {

        $(document).ready(function() {

            $.ajax({
                url :"http://devpay.biz/lagrace/Controlleur/controlleurpaie.php",
                method: "post",
                data:{limit:'limit'},
                success:function (result) {
                    $("#tbody").html(result);
                },
                error: function(){  // error handling
                    $("#tbody").append('<tbody class="employee-grid-error"><tr><th colspan="3">Aucune donnee trouvee</th></tr></tbody>');

                }
            });

        } );

    }


    function datachart() {
        $.ajax({
            method: "POST",
            url: "http://devpay.biz/lagrace/Controlleur/controlleurpaie.php",
            data: {datachart:'datachart'},
            success: function (result) {
                if(result)
                {
                    var tableau=result.split(";");
                    var nb1=tableau[0];
                    var nb2=tableau[1];
                    var nb3=nb1-nb2;
                    console.log(nb1+" "+nb2);

                    var data = {
                        labels: ["debit", "credit"],
                        series: [nb2, nb3]
                    };

                    new Chartist.Pie(".ct-chart", data);
                }

                console.log(result);

            }

        });

    }
</script>

<script type="text/javascript" language="javascript" >
    $(document).ready(function() {

        $.ajax({
            url :"http://devpay.biz/lagrace/Controlleur/controlleurpaie.php",
            method: "post",
            data:{details:'details'},
            success:function (result) {
                $("#tbody").html(result);


            },
            error: function(){  // error handling
                $("#tbody").append('<tbody class="employee-grid-error"><tr><th colspan="3">Aucune donnee trouvee</th></tr></tbody>');

            }
        });

    } );
</script>

<script type="text/javascript" language="javascript" >
    $(document).ready(function() {

        $.ajax({
            url :"http://devpay.biz/lagrace/Controlleur/controlleurversement.php",
            method: "post",
            data:{detailsvers:'detailsvers'},
            success:function (result) {
                $("#tbodyvers").html(result);


            },
            error: function(){  // error handling
                $("#tbodyvers").append('<tbody class="employee-grid-error"><tr><th colspan="3">Aucune donnee trouvee</th></tr></tbody>');

            }
        });

    } );
</script>

<script>
    $(document).ready(function () {
        var objet=$("#matricule");
        objet.keyup(function () {

            var matricule=objet.val();

            $.ajax({
                url:'http://devpay.biz/lagrace/Controlleur/controlleureleve.php',
                method:'POST',
                data:{verifiemat:'verifiemat',matricule:matricule},
                success:function (result) {
                    if(result!=';') {
                        var tab=result.split(';');
                        $("#matricule").css({'color':'green'});
                        $("#nom").val(tab[0]);
                        $("#postnom").val(tab[1]);

                    }
                    else
                    {
                        $("#matricule").css({'color':'red'});
                        $("#nom").val('INCONNU');
                        $("#postnom").val('INCONNU');

                    }

                }
            })
        })
    });
</script>
<script>

    $(document).ready(function () {
        var objet=$("#searchpaie");
        objet.keyup(function () {
            var mot=objet.val();
            var bool=!isNaN(Date.parse(mot));
            var isdate='faux';
            if(bool)
            {
                isdate='vrai';
            }
            $.ajax({
                url :"http://devpay.biz/lagrace/Controlleur/controlleurpaie.php",
                method: "post",
                data:{mot:mot,isdate:isdate},
                success:function (result) {
                    var tab=result.split(';');
                    var result2=tab[0];
                    var mnt=tab[1];
                    $("#montanttotal").html(mnt);
                    $("#tbody").html(result2);


                },
                error: function(){  // error handling
                    $("#tbody").append('<tbody class="employee-grid-error"><tr><th colspan="3">Aucune donnee trouvee</th></tr></tbody>');

                }

            })
        })
    })

</script>

<script>

    $(document).ready(function () {
        var objet=$("#searchvers");
        objet.keyup(function () {
            var motvers=objet.val();
            var bool=!isNaN(Date.parse(motvers));
            var isdate='faux';
            if(bool)
            {
                isdate='vrai';
            }
            $.ajax({
                url :"http://devpay.biz/lagrace/Controlleur/controlleurversement.php",
                method: "post",
                data:{motvers:motvers,isdate:isdate},
                success:function (result) {
                    var tab=result.split(';');
                    var result2=tab[0];
                    var mnt=tab[1];
                    $("#montanttotalvers").html(mnt);
                    $("#tbodyvers").html(result2);


                },
                error: function(){  // error handling
                    $("#tbodyvers").append('<tbody class="employee-grid-error"><tr><th colspan="3">Aucune donnee trouvee</th></tr></tbody>');

                }

            })
        })
    })

</script>

<script>

    $(document).ready(function () {
        var objet=$("#data");
        var objet2=$("#annee");
        objet.change(function () {
            var intitule=objet.val();
            var annee=objet2.val();

            $.ajax({
                url :"http://devpay.biz/lagrace/Controlleur/controlleurpaie.php",
                method: "post",
                data:{intitule:intitule,annee:annee},
                success:function (result) {
                    $("#tbody").html(result);


                },
                error: function(){  // error handling
                    $("#tbody").append('<tbody class="employee-grid-error"><tr><th colspan="3">Aucune donnee trouvee</th></tr></tbody>');

                }

            })
        })
    })

</script>

<script>

    $(document).ready(function () {
        var objet=$("#annee");
        var objet2=$("#data2");

        objet.keyup(function () {
            var annee=objet.val();
            var intitule=objet2.val();
            $.ajax({
                url :"http://devpay.biz/lagrace/Controlleur/controlleurpaie.php",
                method: "post",
                data:{intitule:intitule,annee:annee},
                success:function (result) {
                    if(result!=';0') {
                        $("#tbody").html(result);
                        var tab = result.split(';');
                        $("#montanttotal").html(tab[1])
                    }

                },
                error: function(){  // error handling
                    $("#tbody").append('<tbody class="employee-grid-error"><tr><th colspan="3">Aucune donnee trouvee</th></tr></tbody>');

                }

            })
        })
    })

</script>

<script>
    $(document).ready(function() {

        $("#btn_dec").click(function () {
            $.ajax({
                method: "POST",
                url: "http://devpay.biz/lagrace/Controlleur/controlleurgerant.php",
                data: {deconnexion:'deconnexion'},
                success: function (result) {
                    if(result=='true')
                    {
                        window.location.replace('http://devpay.biz/lagrace/Vue/user-login.php');

                    }
                    else
                    {
                        alert('Probleme de deconnexion');


                    }

                }
            });


        });




    });


</script>

<script>

    $(document).ready(function () {


        $.ajax({
            url :"http://devpay.biz/lagrace/Controlleur/controlleurprix.php",
            method: "post",
            data:{detailsprix:'detailsprix'},
            success:function (result) {
                $("#tbodyprix").html(result);



            },
            error: function(){
                $("#tbodyprix").append('<tbody class="employee-grid-error"><tr><th colspan="3">Aucune donnee trouvee</th></tr></tbody>');

            }

        });



    })

</script>
<script>
    $(document).ready(function () {
        var objet1=$("#montant");
        var objet2=$("#data");
        objet1.blur(function () {
            var montant=objet1.val();
            var data=objet2.val();
            var tab=data.split(':');
            var motif=tab[0];

            $.ajax({
                url :"http://devpay.biz/lagrace/Controlleur/controlleurprix.php",
                method: "post",
                data:{checkprix:'checkprix',motif:motif,montant:montant},
                success:function (result) {
                    if(result>montant) {
                        objet1.css({'color': 'red'});
                        Materialize.toast('incomplet', 2000);
                        $("#status").val('incomplet');
                    }
                    else if(result==montant)
                    {
                        objet1.css({'color': 'green'});
                        Materialize.toast('complet', 2000);
                        $("#status").val('complet');

                    }
                    else if(result<montant)
                    {
                        objet1.css({'color': 'blue'});
                        Materialize.toast('montant superieur', 2000);
                        $("#status").val('superieur');
                    }



                },
                error: function(){
                    alert('page not found');
                }

            });

        })
    })
</script>

<script>
    $(document).ready(function () {
        $("#btn_enr_divers").click(function () {


            var typevers=$("#typeversement").val();
            var nomvers=$("#nomdivers").val();
            var montantvers=$("#montantdivers").val();
            var motifvers=$("#motifvers").val();



            $.ajax({
                url:'http://devpay.biz/lagrace/Controlleur/controlleurversement.php',
                method:"POST",
                data:{insertnewvers:'insertnewvers',montantvers:montantvers,typevers:typevers,nomvers:nomvers,motifvers:motifvers},
                success:function (result) {

                    Materialize.toast(result,2000);




                }
            })
        });
    });
</script>
</body>

</html>
