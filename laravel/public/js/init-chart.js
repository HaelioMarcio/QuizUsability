(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();
    $('.scrollspy').scrollSpy();

      var randomnb = function(){ return Math.round(Math.random()*100)};       

      $('#container-chart').highcharts({

          chart: {
              polar: true,
              type: 'spline'
          },

          title: {
              text: 'Avaliação Heurística',
              x: -80
          },

          pane: {
              size: '80%'
          },

          xAxis: {
              categories: ["Visibilidade do status do sistema",
                  "Correspondência entre o sistema e o mundo real",
                  "Controle do usuário e liberdade",
                  "Consistência e padrões",
                  "Prevenção de erros",
                  "Reconhecimento em vez de recordação",
                  "Flexibilidade e eficiência de utilizacão",
                  "Estática e design minimalista",
                  "Reconhecimento, diagnóstico e auto-recuperação em caso de erros",
                  "Ajuda e documentação"],
              tickmarkPlacement: 'on',
              lineWidth: 0
          },

          yAxis: {
              gridLineInterpolation: 'circle',
              lineWidth: 0,
              min: 0
          },

          tooltip: {
              shared: true,
              pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}</b><br/>'
          },

          legend: {
              align: 'right',
              verticalAlign: 'top',
              y: 90,
              layout: 'vertical'
          },

          series: [{
              name: 'Site A',
              data: [100, 100, 100, 100, 100, 100, 100, 100, 100, 100],
              pointPlacement: 'on'
          }, {
              name: 'Site B',
              data: [28, 48, 40, 19, 96, randomnb(), randomnb(), randomnb(), 100, 80],
              pointPlacement: 'on'
          }]

      });

  }); // end of document ready
})(jQuery); // end of jQuery name space