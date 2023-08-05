(self["webpackChunksurveyor_front"]=self["webpackChunksurveyor_front"]||[]).push([[606],{7297:function(t){function e(t){return void 0===t}function s(t){return null===t}function r(t){return"boolean"===typeof t}function i(t){return t===Object(t)}function n(t){return Array.isArray(t)}function a(t){return t instanceof Date}function o(t,s){return s?i(t)&&!e(t.uri):i(t)&&"number"===typeof t.size&&"string"===typeof t.type&&"function"===typeof t.slice}function u(t,e){return o(t,e)&&"string"===typeof t.name&&(i(t.lastModifiedDate)||"number"===typeof t.lastModified)}function l(t){return!e(t)&&t}function h(t,c,d,f){c=c||{},d=d||new FormData,c.indices=l(c.indices),c.nullsAsUndefineds=l(c.nullsAsUndefineds),c.booleansAsIntegers=l(c.booleansAsIntegers),c.allowEmptyArrays=l(c.allowEmptyArrays),c.noAttributesWithArrayNotation=l(c.noAttributesWithArrayNotation),c.noFilesWithArrayNotation=l(c.noFilesWithArrayNotation),c.dotsForObjectNotation=l(c.dotsForObjectNotation);const p="function"===typeof d.getParts;return e(t)||(s(t)?c.nullsAsUndefineds||d.append(f,""):r(t)?c.booleansAsIntegers?d.append(f,t?1:0):d.append(f,t):n(t)?t.length?t.forEach(((t,e)=>{let s=f+"["+(c.indices?e:"")+"]";(c.noAttributesWithArrayNotation||c.noFilesWithArrayNotation&&u(t,p))&&(s=f),h(t,c,d,s)})):c.allowEmptyArrays&&d.append(c.noAttributesWithArrayNotation?f:f+"[]",""):a(t)?d.append(f,t.toISOString()):i(t)&&!o(t,p)?Object.keys(t).forEach((e=>{const s=t[e];if(n(s))while(e.length>2&&e.lastIndexOf("[]")===e.length-2)e=e.substring(0,e.length-2);const r=f?c.dotsForObjectNotation?f+"."+e:f+"["+e+"]":e;h(s,c,d,r)})):d.append(f,t)),d}t.exports={serialize:h}},3459:function(t,e,s){"use strict";s.d(e,{Z:function(){return c}});var r=s(2042),i=s(6414);const{t:n,te:a}=i["default"].global;class o{constructor(){this.errors={},this.status=null,this.message=""}has(t){for(let e in this.errors)if(e===t)return!0;return!1}any(){return null!==this.errors&&void 0!==this.errors&&Object.keys(this.errors).length>0}get(t){if(this.errors[t])return this.errors[t][0]}record(t){this.errors=void 0!==t.errors?t.errors:{},this.message=void 0!==t.message?t.message:""}setStatus(t){this.status=t}clear(t=null){if(t)return delete this.errors[t],void(this.errors.length||(this.message=""));this.errors={},this.status=null,this.message=""}getMessage(){return null!==this.status&&a("response.errors."+this.status)?n("response.errors."+this.status):this.message}}var u=o,l=s(7297);class h{constructor(t){this.$data=t,this.$errors=new u,this.$canSubmit=!0,this.$multipart=!1,this.$json=!1,this.$id=t["id"]??null;for(let e in t)this[e]=t[e]}setData(t){for(let e in this.$data)delete this[e];this.$data=t;for(let e in t)this[e]=t[e];this.$id=t["id"]??null,this.clearError()}updateData(t,e=!0){for(let s in this.$data)this.$data[s]=t[s],this[s]=t[s];e&&(this.$id=t["id"]??null),this.clearError()}getId(){return this.$id}deleteData(){for(let t in this.$data)delete this[t];this.$data={}}setFile(t,e,s=!1){if("object"===typeof e){if(this.$multipart=!0,s)return this[t]=e,!0;if(e[0]instanceof File)return this[t]=e[0],!0}return!1}getHeaders(){let t={};return this.$multipart&&(t["Content-Type"]="multipart/form-data"),t}getData(){let t={};for(let e in this.$data)t[e]=this[e];return t}formData(){let t={indices:!0,booleansAsIntegers:!0,allowEmptyArrays:!0};return(0,l.serialize)(this.getData(),t)}jsonData(){let t={};for(let e in this.$data)null!==this[e]&&"undefined"!==typeof this[e]&&(t[e]=this[e]);return t}addData(t,e){this[t]?this[t]=e:(this[t]=e,this.$data[t]=e)}isSubmittable(){return this.$canSubmit}isUpdate(){return null!==this.$id}json(){return this.$json=!0,this}isJson(){return this.$json}post(t,e=null){return e?this.submit("post",`${t}/${e}`):this.submit("post",t)}put(t,e=null){return e?this.submit("put",`${t}/${e}`):this.submit("put",`${t}`)}patch(t,e=null){return e?this.submit("patch",`${t}/${e}`):this.submit("patch",t)}delete(t,e=null){return e?this.submit("delete",`${t}/${e}`):this.submit("delete",t)}submit(t,e){this.beforeSubmit();let s=this.isJson()?this.jsonData():this.formData(),i={headers:this.getHeaders()};return new Promise(((n,a)=>{r.Z[t](e,s,i).then((t=>{this.onSuccess(t.data),n(t.data)})).catch((t=>{this.onFail(t.response),a(t.response.data)})).finally((()=>{this.afterSubmit()}))}))}reset(){for(let t in this.$data)this[t]=this.$data[t];this.$errors.clear()}hasError(t){return this.$errors.has(t)}getErrorMessage(){return this.$errors.getMessage()}getError(t){return this.$errors.get(t)}clearError(t=null){return this.$errors.clear(t)}beforeSubmit(){this.$canSubmit=!1}afterSubmit(){this.$canSubmit=!0}onSuccess(t){this.isUpdate()&&this.updateData(t,!1),this.reset()}onFail(t){this.$errors.setStatus(t.status),void 0!==t.data&&this.$errors.record(t.data)}}var c=h},4792:function(t,e,s){"use strict";var r=s(4677);class i{constructor(){this.toast=(0,r.pm)(),this.config={position:"bottom-center",timeout:5e3,closeOnClick:!0,pauseOnFocusLoss:!0,pauseOnHover:!0,showCloseButtonOnHover:!1,closeButton:"button",icon:!0}}fire(t,e="info",s={}){this.toast[e](t,{...this.config,...s})}}e["Z"]=new i},9606:function(t,e,s){"use strict";s.r(e),s.d(e,{default:function(){return A}});var r=s(3396),i=s(9242),n=s(7139);const a={class:"grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6"},o={class:"col-span-12 xl:col-span-8"},u={class:"p-4 card sm:p-5"},l={class:"space-y-4"},h={for:"textName"},c={class:"relative flex mt-1.5"},d={class:"pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:peer-focus:text-accent dark:text-navy-300"},f={class:"text-end"};function p(t,e,s,p,m,b){const g=(0,r.up)("breadcrumb-list"),$=(0,r.up)("v-icon"),y=(0,r.up)("validation-feedback"),v=(0,r.up)("v-button");return(0,r.wg)(),(0,r.iD)(r.HY,null,[(0,r.Wm)(g,{items:m.breadcrumbs},null,8,["items"]),(0,r._)("div",a,[(0,r._)("div",o,[(0,r._)("div",u,[(0,r._)("form",{onInput:e[1]||(e[1]=t=>m.form.clearError(t.target.name)),onSubmit:e[2]||(e[2]=(0,i.iM)((t=>b.submit()),["prevent"]))},[(0,r._)("div",l,[(0,r._)("div",null,[(0,r._)("label",h,(0,n.zw)(t.$t("attributes.name")),1),(0,r._)("span",c,[(0,r.wy)((0,r._)("input",{"onUpdate:modelValue":e[0]||(e[0]=t=>m.form.name=t),id:"textName",name:"name",type:"text",class:"w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 form-input peer hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"},null,512),[[i.nr,m.form.name]]),(0,r._)("span",d,[(0,r.Wm)($,{name:"beaker",size:"6"})])]),(0,r.Wm)(y,null,{default:(0,r.w5)((()=>[(0,r.Uk)((0,n.zw)(m.form.getError("name")),1)])),_:1})]),(0,r._)("div",f,[(0,r.Wm)(v,{type:"submit",color:"primary",disabled:!m.form.isSubmittable()},{default:(0,r.w5)((()=>[(0,r.Uk)((0,n.zw)(t.$t("labels.submit")),1)])),_:1},8,["disabled"])])])],32)])])])],64)}var m=s(2042),b=s(3459),g=s(4792),$={name:"ClinicForm",props:{id:{type:String,required:!1}},data(){return{breadcrumbs:[{title:this.$t("titles.clinics"),route:"clinics"},{title:this.id?this.$t("models.clinic.edit"):this.$t("models.clinic.add"),active:!0}],form:new b.Z({name:""})}},async created(){this.id&&await m.Z.get(`/clinic/${this.id}`).then((({data:t})=>{this.form.updateData(t)}))},methods:{submit(){this.form.isUpdate()?this.form.post("/clinic/update",this.form.getId()).then((()=>{g.Z.fire(this.$t("response.success.update"),"success")})).catch((()=>{g.Z.fire(this.form.getErrorMessage(),"error")})):this.form.post("/clinic/store").then((()=>{g.Z.fire(this.$t("response.success.store"),"success")})).catch((()=>{g.Z.fire(this.form.getErrorMessage(),"error")}))}}},y=s(89);const v=(0,y.Z)($,[["render",p]]);var A=v}}]);
//# sourceMappingURL=606.6ebaec3f.js.map