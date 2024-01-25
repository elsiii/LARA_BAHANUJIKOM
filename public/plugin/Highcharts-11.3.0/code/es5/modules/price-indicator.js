/**
 * Highstock JS v11.3.0 (2024-01-10)
 *
 * Advanced Highcharts Stock tools
 *
 * (c) 2010-2024 Highsoft AS
 * Author: Torstein Honsi
 *
 * License: www.highcharts.com/license
 */!function(s){"object"==typeof module&&module.exports?(s.default=s,module.exports=s):"function"==typeof define&&define.amd?define("highcharts/modules/price-indicator",["highcharts","highcharts/modules/stock"],function(i){return s(i),s.Highcharts=i,s}):s("undefined"!=typeof Highcharts?Highcharts:void 0)}(function(s){"use strict";var i=s?s._modules:{};function t(s,i,t,e){s.hasOwnProperty(i)||(s[i]=e.apply(null,t),"function"==typeof CustomEvent&&window.dispatchEvent(new CustomEvent("HighchartsModuleLoaded",{detail:{path:i,module:s[i]}})))}t(i,"Extensions/PriceIndication.js",[i["Core/Globals.js"],i["Core/Utilities.js"]],function(s,i){var t=s.composed,e=i.addEvent,r=i.isArray,o=i.merge,a=i.pushUnique;function c(){var s=this.options,i=s.lastVisiblePrice,t=s.lastPrice;if((i||t)&&"highcharts-navigator-series"!==s.id){var e=this.xAxis,a=this.yAxis,c=a.crosshair,l=a.cross,h=a.crossLabel,n=this.points,d=this.yData.length,u=n.length,p=this.xData[this.xData.length-1],b=this.yData[d-1],P=void 0;if(t&&t.enabled&&(a.crosshair=a.options.crosshair=s.lastPrice,!this.chart.styledMode&&a.crosshair&&a.options.crosshair&&s.lastPrice&&(a.crosshair.color=a.options.crosshair.color=s.lastPrice.color||this.color),a.cross=this.lastPrice,P=r(b)?b[3]:b,this.lastPriceLabel&&this.lastPriceLabel.destroy(),delete a.crossLabel,a.drawCrosshair(null,{x:p,y:P,plotX:e.toPixels(p,!0),plotY:a.toPixels(P,!0)}),this.yAxis.cross&&(this.lastPrice=this.yAxis.cross,this.lastPrice.addClass("highcharts-color-"+this.colorIndex),this.lastPrice.y=P),this.lastPriceLabel=a.crossLabel),i&&i.enabled&&u>0){a.crosshair=a.options.crosshair=o({color:"transparent"},s.lastVisiblePrice),a.cross=this.lastVisiblePrice;var f=n[u-1].isInside?n[u-1]:n[u-2];this.lastVisiblePriceLabel&&this.lastVisiblePriceLabel.destroy(),delete a.crossLabel,a.drawCrosshair(null,f),a.cross&&(this.lastVisiblePrice=a.cross,f&&"number"==typeof f.y&&(this.lastVisiblePrice.y=f.y)),this.lastVisiblePriceLabel=a.crossLabel}a.crosshair=a.options.crosshair=c,a.cross=l,a.crossLabel=h}}return{compose:function s(i){a(t,s)&&e(i,"afterRender",c)}}}),t(i,"masters/modules/price-indicator.src.js",[i["Core/Globals.js"],i["Extensions/PriceIndication.js"]],function(s,i){i.compose(s.Series)})});