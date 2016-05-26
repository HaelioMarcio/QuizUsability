(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();
    $('.scrollspy').scrollSpy();

    var randomnb = function(){ return Math.round(Math.random()*100)};

    			var options = {
                    responsive:true
                };


                var dataradar = {
                    labels: [
                        "Visibilidade do status do sistema",
                        "Correspondência entre o sistema e o mundo real",
                        "Controle do usuário e liberdade",
                        "Consistência e padrões",
                        "Prevenção de erros",
                        "Reconhecimento em vez de recordação",
                        "Flexibilidade e eficiência de utilizacão",
                        "Estática e design minimalista"
                        ],
                    datasets: [
                        {
                            label: "Dados da Ibyte",
                            fillColor: "rgba(220,220,220,0.2)",
                            strokeColor: "rgba(220,220,220,1)",
                            pointColor: "rgba(220,220,220,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(220,220,220,1)",
                            data: [100, 100, 100, 100, 100, 100, 100, 100]
                        },
                        {
                            label: "Dados da Cecomil",
                            fillColor: "rgba(151,187,205,0.2)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: [28, 48, 40, 19, 96, randomnb(), randomnb(), randomnb()]
                        }
                    ]
                };      
                
                window.onload = function(){
                    var ctx = document.getElementById("radar").getContext("2d");
                    var RadarChart = new Chart(ctx).Radar(dataradar, options);
                }  



  }); // end of document ready
})(jQuery); // end of jQuery name space