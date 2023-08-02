"use strict";(self["webpackChunksurveyor_front"]=self["webpackChunksurveyor_front"]||[]).push([[438],{8989:function(e,t,i){i(7658);var s=i(2042),n=i(2995);class o{constructor(e,t=!0){this.id=t?null:e.id,this.question_type_id=t?e.id:e.question_type_id,this.main_question_type_id=e.main_question_type_id,this.component=e.component,this.component_name=e.label,this.component_description=e.description,this.label=e.label,this.description=e.description,this.required=e.required??!1,this.order=e.order,this.value=e.value,e?.options?.related_to?(this.values=e.values,this.options=e.options):(this.values=Array.isArray(e.values)?JSON.parse(JSON.stringify(e.values)):e.values,this.options=null!==e.options&&"object"===typeof e.options?JSON.parse(JSON.stringify(e.options)):{}),this.show_options=!1}get(e,t=null){return"undefined"!==typeof this[e]?this[e]:t}set(e,t){this[e]=t}getOption(e,t=null){return this.options&&"undefined"!==typeof this.options[e]?this.options[e]:t}setOption(e,t=null){null!==t?this.options[e]=t:delete this.options[e]}toggleOption(e){"undefined"===typeof this.options[e]?this.options[e]=!0:this.options[e]=!this.options[e]}getValue(e,t,i=null){return"undefined"!==typeof this.values[e][t]?this.values[e][t]:i}setValue(e,t,i=null){null!==i?this.values[e][t]=i:delete this.values[t]}addValue(e,t=null){this.values.push({label:e,score:t??this.values.length+1})}removeValue(e){this.values.splice(e,1)}getOptionShowAble(){return this.show_options}toggleOptionShowAble(){this.show_options=!this.show_options}isUpdatable(){return!("undefined"===typeof this.main_question_type_id||null===this.main_question_type_id)}storeType(){return new Promise(((e,t)=>{s.Z.post("/question-type/store",this).then((t=>{this.question_type_id=t.data.id,this.main_question_type_id=t.data.main_question_type_id,e(t)})).catch((e=>{t(e)}))}))}updateType(){return new Promise(((e,t)=>{s.Z.post(`/question-type/update/${this.question_type_id}`,this).then((t=>{e(t)})).catch((e=>{t(e)}))}))}getOptionImage(e="image",t=null){return this.getOption(e)?`${n.FX}/images/templates/options/${this.getOption(e)}`:t}getValueImage(e=null){return this.get("value")?`${n.FX}/images/templates/value/${this.get("value")}`:e}}t["Z"]=o},9421:function(e,t,i){i(7658);var s=i(8989),n=i(2042);class o{constructor(e=null){this.id=null,this.name=null,this.description=null,this.types=[],this.questions=[],e&&(this.id=e.id??null,this.name=e.name??null,this.description=e.description??null,e.questions&&this.saveQuestions(e.questions,!1))}generateQuestion(e,t=!0){let i={...e,order:this.questions.length+1};if("InputMultipleRadioGroup"===e.component&&(null===e?.options?.related_id||"undefined"===typeof e?.options?.related_id)&&(null===e?.options?.related_to||"undefined"===typeof e?.options?.related_to)){let e=[];this.questions.forEach((t=>{null!==t.getOption("related_id")&&e.push(parseInt(t.getOption("related_id")))})),"object"===typeof i.options&&null!==i.options||(i.options={}),i.options.related_id=e.length?Math.max(...e)+1:1}return new s.Z(i,t)}addQuestion(e,t=!0){let i=this.generateQuestion(e,t);this.questions.push(i),this.reOrder()}addRelatedQuestion(e){let t={...e};"object"===typeof t.options&&null!==t.options||(t.options={}),t.options={...e.options,related_id:void 0,related_to:e.options.related_id};let i=this.generateQuestion(t,!1);this.questions.push(i),this.reOrder()}getRelatedQuestions(e){return this.questions.filter((t=>parseInt(t.getOption("related_id"))===parseInt(e)||parseInt(t.getOption("related_to"))===parseInt(e)))}getRelatedQuestion(e){return this.questions.find((t=>parseInt(t.getOption("related_id"))===parseInt(e)))}getOnlyRelatedQuestions(e){return this.questions.filter((t=>parseInt(t.getOption("related_to"))===parseInt(e)))}saveQuestions(e,t=!0,i=!0){i&&(this.questions=[]),e.forEach((e=>{if(e?.options?.related_to){let t=this.getRelatedQuestion(e?.options?.related_to);e.values=t.values}this.addQuestion(e,t)}))}removeQuestion(e){let t=this.questions[e];if(t.getOption("related_id")){let e=parseInt(t.options.related_id);this.questions=this.questions.filter((t=>parseInt(t.getOption("related_id"))!==e&&parseInt(t.getOption("related_to"))!==e))}else this.questions.splice(e,1);this.reOrder()}removeQuestionByOrder(e){let t=this.questions.findIndex((t=>t.order===e));this.removeQuestion(t)}getQuestions(){return this.questions}getRenderAbleQuestions(){return this.questions.filter((e=>null===e.getOption("related_to")))}reOrder(){const e=[];this.questions.forEach((t=>{t.getOption("related_to")||e.push(t),t.getOption("related_id")&&this.getOnlyRelatedQuestions(t.getOption("related_id")).forEach((t=>{e.push(t)}))})),this.questions=e,this.questions.forEach(((e,t)=>e.order=t+1))}getTypes(){n.Z.get("/question-types").then((({data:e})=>{this.types=e}))}addType(e){this.types.push(e)}removeType(e){const t=this.types.findIndex((t=>t.id===e));this.types.splice(t,1),this.questions=this.questions.filter((t=>t.question_type_id!==e)),this.reOrder()}deleteType(e){return new Promise(((t,i)=>{n.Z.post(`/question-type/delete/${e}`).then((i=>{this.removeType(e),t(i)})).catch((e=>{i(e)}))}))}editType(e,t){let i=this.types.findIndex((t=>t.id===e));this.types[i]=t}}t["Z"]=o},8438:function(e,t,i){i.d(t,{Z:function(){return _e}});var s=i(3396),n=i(7139);const o={key:"isSurveyQuestionLabelShowAble",class:"mb-3 text-lg font-medium"};function r(e,t,i,r,l,u){return(0,s.wg)(),(0,s.iD)(s.HY,null,[u.labelShowable?((0,s.wg)(),(0,s.iD)("p",o,(0,n.zw)(e.$t("labels.survey_question_order",{order:i.question.get("order")}))+" "+(0,n.zw)(i.question.get("label")),1)):(0,s.kq)("",!0),((0,s.wg)(),(0,s.j4)((0,s.LL)(`Survey${i.question.component}`),{template:i.template,question:i.question},null,8,["template","question"]))],64)}var l=i(9421),u=i(8989);const a={class:"w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 form-input hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent",type:"text"};function p(e,t,i,n,o,r){return(0,s.wg)(),(0,s.iD)("input",a)}var d={name:"SurveyInputText",props:{template:{type:l.Z,required:!0},question:{type:u.Z,required:!0}}},c=i(89);const h=(0,c.Z)(d,[["render",p]]);var g=h;const y={class:"w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 form-input hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent",type:"number"};function v(e,t,i,n,o,r){return(0,s.wg)(),(0,s.iD)("input",y)}var m={name:"SurveyInputNumber",props:{template:{type:l.Z,required:!0},question:{type:u.Z,required:!0}}};const f=(0,c.Z)(m,[["render",v]]);var q=f;const b={class:"flex flex-col gap-3"},_={class:"inline-flex"},w=["id"],x=["for"];function O(e,t,i,o,r,l){return(0,s.wg)(),(0,s.iD)("div",b,[((0,s.wg)(!0),(0,s.iD)(s.HY,null,(0,s.Ko)(i.question.get("values"),((e,t)=>((0,s.wg)(),(0,s.iD)("div",{key:t,class:"flex gap-2"},[(0,s._)("label",_,[(0,s._)("input",{id:`question${i.question.get("id")}Radio${t}`,class:"h-4 w-4 rounded-full border-slate-400/70 form-radio is-basic checked:border-slate-500 checked:bg-slate-500 hover:border-slate-500 focus:border-slate-500 dark:border-navy-400 dark:checked:bg-navy-400",name:"basic",type:"radio"},null,8,w)]),(0,s._)("label",{for:`question${i.question.get("id")}Radio${t}`},(0,n.zw)(e.label),9,x)])))),128))])}var k={name:"SurveyInputRadioGroup",props:{template:{type:l.Z,required:!0},question:{type:u.Z,required:!0}}};const I=(0,c.Z)(k,[["render",O]]);var Z=I;const S={class:"flex flex-col gap-3"},D={class:"inline-flex items-center space-x-2"},$=["id"],Q=["for"];function R(e,t,i,o,r,l){return(0,s.wg)(),(0,s.iD)("div",S,[((0,s.wg)(!0),(0,s.iD)(s.HY,null,(0,s.Ko)(i.question.get("values"),((e,t)=>((0,s.wg)(),(0,s.iD)("div",{key:t,class:"flex gap-2"},[(0,s._)("label",D,[(0,s._)("input",{id:`question${i.question.get("id")}Checkbox${t}`,class:"h-4 w-4 rounded border-slate-400/70 form-checkbox is-basic checked:border-slate-500 checked:bg-slate-500 hover:border-slate-500 focus:border-slate-500 dark:border-navy-400 dark:checked:bg-navy-400",type:"checkbox"},null,8,$)]),(0,s._)("label",{for:`question${i.question.get("id")}Checkbox${t}`},(0,n.zw)(e.label),9,Q)])))),128))])}var z={name:"SurveyInputCheckboxGroup",props:{template:{type:l.Z,required:!0},question:{type:u.Z,required:!0}}};const T=(0,c.Z)(z,[["render",R]]);var C=T;const H={class:"w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 form-input hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent",type:"date"};function G(e,t,i,n,o,r){return(0,s.wg)(),(0,s.iD)("input",H)}var V={name:"SurveyInputDate",props:{template:{type:l.Z,required:!0},question:{type:u.Z,required:!0}}};const Y=(0,c.Z)(V,[["render",G]]);var A=Y;const N={class:"mb-3 text-lg font-medium"},E={class:"flex flex-col gap-3"},M={class:"grow"},j={class:"font-medium"},J={class:"inline-flex"},K=["id","name"],L=["for"];function P(e,t,i,o,r,l){return(0,s.wg)(),(0,s.iD)(s.HY,null,[(0,s._)("p",N,(0,n.zw)(i.question.getOption("title")),1),(0,s._)("div",E,[((0,s.wg)(!0),(0,s.iD)(s.HY,null,(0,s.Ko)(i.template.getRelatedQuestions(i.question.getOption("related_id")),(t=>((0,s.wg)(),(0,s.iD)("div",{key:t.order,class:"flex items-center gap-6"},[(0,s._)("div",M,[(0,s._)("span",j,(0,n.zw)(e.$t("labels.survey_question_order",{order:t.get("order")})),1),(0,s.Uk)(" "+(0,n.zw)(t.label),1)]),((0,s.wg)(!0),(0,s.iD)(s.HY,null,(0,s.Ko)(t.get("values"),((e,i)=>((0,s.wg)(),(0,s.iD)("div",{key:i,class:"flex shrink-0 gap-2"},[(0,s._)("label",J,[(0,s._)("input",{id:`question${t.get("id")}Radio${i}`,name:`question${t.get("id")}`,class:"h-4 w-4 rounded-full border-slate-400/70 form-radio is-basic checked:border-slate-500 checked:bg-slate-500 hover:border-slate-500 focus:border-slate-500 dark:border-navy-400 dark:checked:bg-navy-400",type:"radio"},null,8,K)]),(0,s._)("label",{for:`question${t.get("id")}Radio${i}`},(0,n.zw)(e.label),9,L)])))),128))])))),128))])],64)}var U={name:"SurveyInputMultipleRadioGroup",props:{template:{type:l.Z,required:!0},question:{type:u.Z,required:!0}}};const F=(0,c.Z)(U,[["render",P]]);var X=F,B=i(9242);const W={class:"flex items-center gap-x-3"},ee={class:"shrink-0 text-lg"},te=["min","max"],ie={class:"shrink-0 text-lg"},se={class:"text-center text-lg font-bold"};function ne(e,t,i,o,r,l){return(0,s.wg)(),(0,s.iD)(s.HY,null,[(0,s._)("div",W,[(0,s._)("div",ee,(0,n.zw)(i.question.getOption("min",0)),1),(0,s.wy)((0,s._)("input",{"onUpdate:modelValue":t[0]||(t[0]=e=>r.value=e),class:"text-slate-500 form-range dark:text-navy-300",type:"range",min:i.question.getOption("min",0),max:i.question.getOption("max",100)},null,8,te),[[B.nr,r.value]]),(0,s._)("div",ie,(0,n.zw)(i.question.getOption("max",100)),1)]),(0,s._)("div",se,(0,n.zw)(r.value),1)],64)}var oe={name:"SurveyInputRange",props:{template:{type:l.Z,required:!0},question:{type:u.Z,required:!0}},data(){return{value:0}}};const re=(0,c.Z)(oe,[["render",ne]]);var le=re;const ue=["src","title","alt"];function ae(e,t,i,o,r,l){return(0,s.wg)(),(0,s.iD)("div",{class:(0,n.C_)(["flex gap-6",l.flexType])},[(0,s._)("p",{class:(0,n.C_)({"order-1":["top","left"].includes(i.question.getOption("image_position","top"))})},(0,n.zw)(i.question.get("value")),3),i.question.getOptionImage()?((0,s.wg)(),(0,s.iD)("div",{key:"isDescriptionHasImage",class:(0,n.C_)(["shrink-0",{"order-0":["top","left"].includes(i.question.getOption("image_position","top")),"max-w-[50%]":["left","right"].includes(i.question.getOption("image_position","top"))}])},[(0,s._)("img",{src:i.question.getOptionImage(),title:e.$t("labels.uploaded_image"),alt:e.$t("labels.description_image"),class:"max-w-full"},null,8,ue)],2)):(0,s.kq)("",!0)],2)}var pe={name:"SurveyOutputDescription",props:{template:{type:l.Z,required:!0},question:{type:u.Z,required:!0}},computed:{flexType(){if(this.question.getOption("image")){let e=this.question.getOption("image_position");if(["top","bottom"].includes(e))return"flex-col";if(["right","left"].includes(e))return"flex-row"}return"flex-col"}}};const de=(0,c.Z)(pe,[["render",ae]]);var ce=de;const he={key:"isDescriptionHasImage"},ge=["src","title","alt"];function ye(e,t,i,n,o,r){return i.question.getValueImage()?((0,s.wg)(),(0,s.iD)("div",he,[(0,s._)("img",{src:i.question.getValueImage(),title:e.$t("labels.uploaded_image"),alt:e.$t("labels.description_image"),class:"max-w-full"},null,8,ge)])):(0,s.kq)("",!0)}var ve={name:"SurveyOutputDescription",props:{template:{type:l.Z,required:!0},question:{type:u.Z,required:!0}}};const me=(0,c.Z)(ve,[["render",ye]]);var fe=me,qe={name:"SurveyInput",components:{SurveyInputText:g,SurveyInputNumber:q,SurveyInputRadioGroup:Z,SurveyInputCheckboxGroup:C,SurveyInputDate:A,SurveyInputMultipleRadioGroup:X,SurveyInputRange:le,SurveyOutputDescription:ce,SurveyOutputImage:fe},props:{template:{type:l.Z,required:!0},question:{type:u.Z,required:!0}},computed:{labelShowable(){let e=["InputMultipleRadioGroup","OutputImage"];return!e.includes(this.question.component)}}};const be=(0,c.Z)(qe,[["render",r]]);var _e=be}}]);
//# sourceMappingURL=438.df688458.js.map