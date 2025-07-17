document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('graficoGastos');
    if (!ctx) return;

    const labels = JSON.parse(ctx.dataset.labels).slice(0, 10);
    const valores = JSON.parse(ctx.dataset.valores).slice(0, 10);
    const selectTipo = document.getElementById('graficoTipo');
    const cores = gerarCoresRGBAUnicas(labels.length);

    selectTipo.value = 'bar';

    function criarChart(tipo) {
        const mostrarLabelETitulo = (tipo === 'doughnut');

        return new Chart(ctx, {
            type: tipo,
            data: {
                labels: labels,
                datasets: [{
                    label: mostrarLabelETitulo ? 'Gastos por Categoria' : '',
                    data: valores,
                    backgroundColor: cores,
                    borderColor: mostrarLabelETitulo ? 'rgba(255, 255, 255, 0.2)' : 'rgba(0,0,0,0.1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: mostrarLabelETitulo,
                        position: 'bottom',
                        
                    },
                    title: {
                        display: mostrarLabelETitulo
                    }
                }
            }
        });
    }

    // Inicializa com 'bar' como padrão
    let chart = criarChart('bar');

    selectTipo.addEventListener('change', function () {
        const novoTipo = this.value;
        chart.destroy();
        chart = criarChart(novoTipo);
    });

    function gerarCoresRGBAUnicas(qtd, alpha = 0.7) {
        const cores = new Set();
        while (cores.size < qtd) {
            const r = Math.floor(Math.random() * 256);
            const g = Math.floor(Math.random() * 256);
            const b = Math.floor(Math.random() * 256);
            const cor = `rgba(${r}, ${g}, ${b}, ${alpha})`;
            cores.add(cor);
        }
        return Array.from(cores);
    }

    const linkDownload = document.getElementById('baixarGrafico');
    if(linkDownload){
        linkDownload.addEventListener('click', function(e){
            
            e.preventDefault();

            // Recuperar os dados completos do backend
            const allLabels = JSON.parse(ctx.dataset.labels); 
            const allValores = JSON.parse(ctx.dataset.valores);
            const tipoSelecionado = document.getElementById('graficoTipo').value;

            // Criar canvas temporário fora da tela
            const tempCanvas = document.createElement('canvas');
            tempCanvas.width = 800;
            tempCanvas.height = 600;
            const tempCtx = tempCanvas.getContext('2d');

            const cores = gerarCoresRGBAUnicas(allLabels.length);

            const downloadPlugin = {
                id: 'downloadPlugin',
                afterDraw(chart) {
                    // Gerar link de download
                    const link = document.createElement('a');
                    link.download = 'grafico-completo.png';
                    link.href = tempCanvas.toDataURL('image/png', 1);
                     console.log('vai clicar');
                    link.click();
                    console.log(link.href);

                    // Destruir gráfico temporário após download
                    chart.destroy();
                }
            };

            new Chart(tempCtx, {
                type: tipoSelecionado,
                data: {
                    labels: allLabels,
                    datasets: [{
                        label: 'Gastos por Categoria',
                        data: allValores,
                        backgroundColor: cores,
                        borderColor: 'rgba(0,0,0,0.1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    animation: {
                        duration: 0 // desativa animação para desenhar rápido
                    },
                    plugins: {
                        legend: { display: true, position: 'bottom' },
                        title: {
                            display: true,
                            text: 'Gráfico Completo - Gastos por Categoria'
                        }
                    }
                },
                plugins: [downloadPlugin]
            });
                
        });

    }
});

