"use strict";(self["webpackChunksurveyor_front"]=self["webpackChunksurveyor_front"]||[]).push([[118],{9118:function(e,t,s){s.r(t),s.d(t,{default:function(){return c}});var r=s(3723),u=s(4386);const n={key:0,class:"grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6"},i={key:0,class:"mt-2 text-xl"};function l(e,t,s,l,a,v){const o=(0,r.up)("breadcrumb-list"),p=(0,r.up)("survey-input");return(0,r.wg)(),(0,r.iD)(r.HY,null,[(0,r.Wm)(o,{items:a.breadcrumbs},null,8,["items"]),a.surveyItem.survey?((0,r.wg)(),(0,r.iD)("div",n,[a.surveyItem.patient?((0,r.wg)(),(0,r.iD)("p",i,[(0,r._)("b",null,(0,u.zw)(e.$t("titles.patient"))+":",1),(0,r.Uk)("  "),(0,r._)("span",null,(0,u.zw)(a.surveyItem.patient.label),1)])):(0,r.kq)("",!0),((0,r.wg)(!0),(0,r.iD)(r.HY,null,(0,r.Ko)(a.surveyItem.survey.getRenderAbleQuestions(),((e,t)=>((0,r.wg)(),(0,r.iD)("div",{key:t,class:"p-4 card"},[(0,r.Wm)(p,{template:a.surveyItem.survey,question:e},null,8,["template","question"])])))),128))])):(0,r.kq)("",!0)],64)}var a=s(2570),v=s(3248),o={name:"SurveyFill",components:{SurveyInput:a.Z},props:{id:{type:[String,Number],required:!0}},data(){return{breadcrumbs:[{title:this.$t("titles.surveys"),route:"app.surveys"},{title:this.$t("titles.fill_survey"),active:!0}],surveyItem:new v.Z}},created(){this.surveyItem.fetch(this.id).then((e=>{console.log(e.survey.questionCount)}))}},p=s(8380);const y=(0,p.Z)(o,[["render",l]]);var c=y}}]);
//# sourceMappingURL=118.2f9bb7bd.js.map