<template>
    <div>
        <div ref="chart" class="w-100 h-100"></div>
    </div>
</template>
<script type="text/babel">
    import * as am4core from '@amcharts/amcharts4/core'
    import * as am4charts from '@amcharts/amcharts4/charts'
    import am4themes_animated from '@amcharts/amcharts4/themes/animated'
    import colors from '../colors'
    import UtilsMixin from './mixins/utils.vue'

    export default {
        mixins: [UtilsMixin],
        props: ['type', 'data', 'scrollbar', 'theme'],
        computed: {
            textColor() {
                return am4core.color(colors[this.theme]['body-color']);
            },
            fillColor() {
                return am4core.color(colors[this.theme]['color-primary']);
            }
        },
        methods: {
            makeChart(options) {
                // chart instance
                var chart = am4core.create(options.el, am4charts.XYChart);

                // data
                chart.data = options.data;

                // chart numbers formatting
                chart.numberFormatter.numberFormat = '#,###.' + Array(this.config('settings.format.number.decimals') + 1).join('#');
                chart.language.locale['_decimalSeparator'] = String.fromCharCode(this.config('settings.format.number.decimal_point'));
                chart.language.locale['_thousandSeparator'] = String.fromCharCode(this.config('settings.format.number.thousands_separator'));

                // chart dates formatting
                chart.dateFormatter.dateFormat = 'MMM d, yyyy';

                // cursor
                chart.cursor = new am4charts.XYCursor();

                // scrollbar
                if (options.scrollbar) {
                    var [amScrollbarBrighterColor, amScrollbarDarkerColor] = [this.fillColor.brighten(0.5), this.fillColor.brighten(-0.1)];
                    chart.scrollbarX = new am4core.Scrollbar();
                    chart.scrollbarX.parent = chart.bottomAxesContainer;
                    chart.scrollbarX.background.fill = this.fillColor;
                    chart.scrollbarX.thumb.background.fill = amScrollbarBrighterColor;
                    chart.scrollbarX.startGrip.background.fill = this.fillColor;
                    chart.scrollbarX.endGrip.background.fill = this.fillColor;
                    chart.scrollbarX.thumb.background.states.getKey('hover').properties.fill = amScrollbarDarkerColor;
                    chart.scrollbarX.thumb.background.states.getKey('down').properties.fill = amScrollbarDarkerColor;
                    chart.scrollbarX.startGrip.background.states.getKey('hover').properties.fill = amScrollbarDarkerColor;
                    chart.scrollbarX.startGrip.background.states.getKey('down').properties.fill = amScrollbarDarkerColor;
                    chart.scrollbarX.endGrip.background.states.getKey('hover').properties.fill = amScrollbarDarkerColor;
                    chart.scrollbarX.endGrip.background.states.getKey('down').properties.fill = amScrollbarDarkerColor;
                    chart.zoomOutButton.background.fill = am4core.color(this.fillColor);
                    chart.zoomOutButton.background.states.getKey('hover').properties.fill = amScrollbarDarkerColor;
                    chart.zoomOutButton.background.states.getKey('down').properties.fill = amScrollbarDarkerColor;
                }

                // date (X) axis
                var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
                dateAxis.skipEmptyPeriods = true;
                dateAxis.tooltip.background.fill = this.fillColor;
                dateAxis.tooltip.background.strokeWidth = 0;
                dateAxis.tooltip.background.cornerRadius = 3;
                dateAxis.tooltip.background.pointerLength = 0;
                dateAxis.tooltip.dy = 5;
                dateAxis.renderer.grid.template.disabled = true;
                dateAxis.renderer.labels.template.fill = this.textColor;

                // value (Y) axis
                var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
//                valueAxis.title.text = options.title;
//                valueAxis.title.fill = am4core.color('#fff');
                valueAxis.tooltip.background.fill = this.fillColor;
                valueAxis.tooltip.background.strokeWidth = 0;
                valueAxis.tooltip.background.cornerRadius = 3;
                valueAxis.tooltip.background.pointerLength = 0;
                valueAxis.tooltip.dx = -5;
                valueAxis.renderer.grid.template.disabled = true;
                valueAxis.renderer.labels.template.fill = this.textColor;

                // series
                var series = chart.series.push(options.type == 'column' ? new am4charts.ColumnSeries() : new am4charts.LineSeries());
                series.tooltip.pointerOrientation = 'horizontal';
                series.stroke = this.fillColor;
                series.strokeWidth = 2;
                series.dataFields.valueY = 'value';
                series.dataFields.dateX = 'date';
                series.tooltipText = '[bold]{value.formatNumber("' + chart.numberFormatter.numberFormat + '")}[/]';

                // fill
                var fillModifier = new am4core.LinearGradientModifier();
                fillModifier.opacities = [0.9, 0.45, 0];
                fillModifier.offsets = [0, 0.35, 0.7];
                fillModifier.gradient.rotation = 90;
                series.fill = this.fillColor;
                series.fillOpacity = 1;
                if (options.type == 'line')
                    series.segments.template.fillModifier = fillModifier;

                // tooltip
                series.tooltip.getFillFromObject = false; // turn off "inheritance" of color from related object
                series.tooltip.autoTextColor = false;
                series.tooltip.label.fill = this.textColor;
                series.tooltip.background.stroke = this.textColor;
                series.tooltip.background.fill = this.fillColor;
                series.tooltip.background.strokeWidth = 1;
                series.tooltip.background.cornerRadius = 3;

                // pre-zoom chart
                var seriesLength = options.data.length;
                if (seriesLength > 30) {
                    chart.events.on('ready', () => {
                        dateAxis.zoomToDates(
                            options.data[seriesLength-30].date,
                            options.data[seriesLength-1].date
                        );
                    });
                }
            }
        },
        created() {
            am4core.useTheme(am4themes_animated);
        },
        mounted() {
            this.makeChart({
                el: this.$refs['chart'],
                type: this.type || 'line',
                data: this.data,
                scrollbar: this.scrollbar || false
            });
        }
    }
</script>
