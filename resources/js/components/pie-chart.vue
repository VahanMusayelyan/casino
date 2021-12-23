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
        props: ['data', 'category', 'value', 'theme'],
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
                var chart = am4core.create(options.el, am4charts.PieChart);

                // data
                chart.data = options.data;

                // chart numbers formatting
                chart.numberFormatter.numberFormat = '#,###.' + Array(this.config('settings.format.number.decimals') + 1).join('#');
                chart.language.locale['_decimalSeparator'] = String.fromCharCode(this.config('settings.format.number.decimal_point'));
                chart.language.locale['_thousandSeparator'] = String.fromCharCode(this.config('settings.format.number.thousands_separator'));

                // radius
                chart.innerRadius = am4core.percent(40);

                var series = chart.series.push(new am4charts.PieSeries());
                series.dataFields.category = options.category;
                series.dataFields.value = options.value;
                series.ticks.template.disabled = true;
                series.labels.template.disabled = true;
                series.slices.template.tooltipText = '{category} - {value.percent}% ({value.value})';
                series.tooltip.pointerOrientation = 'vertical';
                series.colors.list = [
                    this.fillColor,
                    this.fillColor.lighten(0.2),
                    this.fillColor.lighten(-0.2),
                    this.fillColor.lighten(0.4),
                    this.fillColor.lighten(0.6),
                    this.fillColor.lighten(-0.4),
                    this.fillColor.lighten(0.6),
                    this.fillColor.lighten(-0.6),
                    this.fillColor.lighten(-0.8),
                    this.fillColor.lighten(0.8)
                ];

                // Add a legend
                chart.legend = new am4charts.Legend();
//                chart.legend.labels.template.text = '{category}';
                chart.legend.labels.template.fontSize = '0.85em';
                chart.legend.labels.template.fill = this.textColor;
                chart.legend.valueLabels.template.fill = this.textColor;
                chart.legend.valueLabels.template.fontSize = '0.85em';
            }
        },
        created() {
            am4core.useTheme(am4themes_animated);
        },
        mounted() {
            this.makeChart({
                el: this.$refs['chart'],
                data: this.data,
                category: this.category || 'category',
                value: this.value || 'value'
            });
        }
    }
</script>