(self["webpackChunksurveyor_front"]=self["webpackChunksurveyor_front"]||[]).push([[315],{7297:function(t){function e(t){return void 0===t}function r(t){return null===t}function s(t){return"boolean"===typeof t}function o(t){return t===Object(t)}function i(t){return Array.isArray(t)}function a(t){return t instanceof Date}function n(t,r){return r?o(t)&&!e(t.uri):o(t)&&"number"===typeof t.size&&"string"===typeof t.type&&"function"===typeof t.slice}function l(t,e){return n(t,e)&&"string"===typeof t.name&&(o(t.lastModifiedDate)||"number"===typeof t.lastModified)}function u(t){return!e(t)&&t}function d(t,c,h,p){c=c||{},h=h||new FormData,c.indices=u(c.indices),c.nullsAsUndefineds=u(c.nullsAsUndefineds),c.booleansAsIntegers=u(c.booleansAsIntegers),c.allowEmptyArrays=u(c.allowEmptyArrays),c.noAttributesWithArrayNotation=u(c.noAttributesWithArrayNotation),c.noFilesWithArrayNotation=u(c.noFilesWithArrayNotation),c.dotsForObjectNotation=u(c.dotsForObjectNotation);const m="function"===typeof h.getParts;return e(t)||(r(t)?c.nullsAsUndefineds||h.append(p,""):s(t)?c.booleansAsIntegers?h.append(p,t?1:0):h.append(p,t):i(t)?t.length?t.forEach(((t,e)=>{let r=p+"["+(c.indices?e:"")+"]";(c.noAttributesWithArrayNotation||c.noFilesWithArrayNotation&&l(t,m))&&(r=p),d(t,c,h,r)})):c.allowEmptyArrays&&h.append(c.noAttributesWithArrayNotation?p:p+"[]",""):a(t)?h.append(p,t.toISOString()):o(t)&&!n(t,m)?Object.keys(t).forEach((e=>{const r=t[e];if(i(r))while(e.length>2&&e.lastIndexOf("[]")===e.length-2)e=e.substring(0,e.length-2);const s=p?c.dotsForObjectNotation?p+"."+e:p+"["+e+"]":e;d(r,c,h,s)})):h.append(p,t)),h}t.exports={serialize:d}},3459:function(t,e,r){"use strict";r.d(e,{Z:function(){return c}});var s=r(2042),o=r(6414);const{t:i,te:a}=o["default"].global;class n{constructor(){this.errors={},this.status=null,this.message=""}has(t){for(let e in this.errors)if(e===t)return!0;return!1}any(){return null!==this.errors&&void 0!==this.errors&&Object.keys(this.errors).length>0}get(t){if(this.errors[t])return this.errors[t][0]}record(t){this.errors=void 0!==t.errors?t.errors:{},this.message=void 0!==t.message?t.message:""}setStatus(t){this.status=t}clear(t=null){if(t)return delete this.errors[t],void(this.errors.length||(this.message=""));this.errors={},this.status=null,this.message=""}getMessage(){return null!==this.status&&a("response.errors."+this.status)?i("response.errors."+this.status):this.message}}var l=n,u=r(7297);class d{constructor(t){this.$data=t,this.$errors=new l,this.$canSubmit=!0,this.$multipart=!1,this.$json=!1,this.$id=t["id"]??null;for(let e in t)this[e]=t[e]}setData(t){for(let e in this.$data)delete this[e];this.$data=t;for(let e in t)this[e]=t[e];this.$id=t["id"]??null,this.clearError()}updateData(t,e=!0){for(let r in this.$data)this.$data[r]=t[r],this[r]=t[r];e&&(this.$id=t["id"]??null),this.clearError()}getId(){return this.$id}deleteData(){for(let t in this.$data)delete this[t];this.$data={}}setFile(t,e,r=!1){if("object"===typeof e){if(this.$multipart=!0,r)return this[t]=e,!0;if(e[0]instanceof File)return this[t]=e[0],!0}return!1}getHeaders(){let t={};return this.$multipart&&(t["Content-Type"]="multipart/form-data"),t}getData(){let t={};for(let e in this.$data)t[e]=this[e];return t}formData(){let t={indices:!0,nullsAsUndefineds:!0,booleansAsIntegers:!0,allowEmptyArrays:!0};return(0,u.serialize)(this.getData(),t)}jsonData(){let t={};for(let e in this.$data)null!==this[e]&&"undefined"!==typeof this[e]&&(t[e]=this[e]);return t}addData(t,e){this[t]?this[t]=e:(this[t]=e,this.$data[t]=e)}isSubmittable(){return this.$canSubmit}isUpdate(){return null!==this.$id}json(){return this.$json=!0,this}isJson(){return this.$json}post(t,e=null){return e?this.submit("post",`${t}/${e}`):this.submit("post",t)}put(t,e=null){return e?this.submit("put",`${t}/${e}`):this.submit("put",`${t}`)}patch(t,e=null){return e?this.submit("patch",`${t}/${e}`):this.submit("patch",t)}delete(t,e=null){return e?this.submit("delete",`${t}/${e}`):this.submit("delete",t)}submit(t,e){this.beforeSubmit();let r=this.isJson()?this.jsonData():this.formData(),o={headers:this.getHeaders()};return new Promise(((i,a)=>{s.Z[t](e,r,o).then((t=>{this.onSuccess(t.data),i(t.data)})).catch((t=>{this.onFail(t.response),a(t.response.data)})).finally((()=>{this.afterSubmit()}))}))}reset(){for(let t in this.$data)this[t]=this.$data[t];this.$errors.clear()}hasError(t){return this.$errors.has(t)}getErrorMessage(){return this.$errors.getMessage()}getError(t){return this.$errors.get(t)}clearError(t=null){return this.$errors.clear(t)}beforeSubmit(){this.$canSubmit=!1}afterSubmit(){this.$canSubmit=!0}onSuccess(t){this.isUpdate()&&this.updateData(t,!1),this.reset()}onFail(t){this.$errors.setStatus(t.status),void 0!==t.data&&this.$errors.record(t.data)}}var c=d},4792:function(t,e,r){"use strict";var s=r(4677);class o{constructor(){this.toast=(0,s.pm)(),this.config={position:"bottom-center",timeout:5e3,closeOnClick:!0,pauseOnFocusLoss:!0,pauseOnHover:!0,showCloseButtonOnHover:!1,closeButton:"button",icon:!0}}fire(t,e="info",r={}){this.toast[e](t,{...this.config,...r})}}e["Z"]=new o},6315:function(t,e,r){"use strict";r.r(e),r.d(e,{default:function(){return F}});var s=r(3396),o=r(9242),i=r(7139);const a={class:"grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6"},n={class:"col-span-12 xl:col-span-8"},l={class:"p-4 card sm:p-5"},u={class:"space-y-4"},d={for:"textName"},c={class:"relative flex mt-1.5"},h={class:"pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:peer-focus:text-accent dark:text-navy-300"},p={class:"rounded-lg border border-slate-200 p-4 dark:border-navy-600"},m={class:"space-y-4"},f={class:"grow"},b=["for"],g=["onUpdate:modelValue","name","id"],y={class:"grow"},$=["for"],v=["onUpdate:modelValue","name","id"],w={class:"self-end"},k=["title","onClick"],_=(0,s._)("i",{class:"fa fa-lg fa-times"},null,-1),x=[_],A={class:"col-span-2 text-end space-x-2"},S={class:"text-end"};function z(t,e,r,_,z,D){const j=(0,s.up)("breadcrumb-list"),E=(0,s.up)("v-icon"),U=(0,s.up)("validation-feedback"),N=(0,s.up)("v-button");return(0,s.wg)(),(0,s.iD)(s.HY,null,[(0,s.Wm)(j,{items:z.breadcrumbs},null,8,["items"]),(0,s._)("div",a,[(0,s._)("div",n,[(0,s._)("div",l,[(0,s._)("form",{onInput:e[1]||(e[1]=t=>z.form.clearError(t.target.name)),onSubmit:e[2]||(e[2]=(0,o.iM)((t=>D.submit()),["prevent"]))},[(0,s._)("div",u,[(0,s._)("div",null,[(0,s._)("label",d,(0,i.zw)(t.$t("attributes.name")),1),(0,s._)("span",c,[(0,s.wy)((0,s._)("input",{"onUpdate:modelValue":e[0]||(e[0]=t=>z.form.name=t),id:"textName",name:"name",type:"text",class:"w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 form-input peer hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"},null,512),[[o.nr,z.form.name]]),(0,s._)("span",h,[(0,s.Wm)(E,{name:"swatch",size:"6"})])]),(0,s.Wm)(U,null,{default:(0,s.w5)((()=>[(0,s.Uk)((0,i.zw)(z.form.getError("name")),1)])),_:1})]),(0,s._)("div",p,[(0,s._)("div",m,[((0,s.wg)(!0),(0,s.iD)(s.HY,null,(0,s.Ko)(z.form.groups,((e,r)=>((0,s.wg)(),(0,s.iD)("div",{key:r,class:"flex gap-x-2 gap-y-4"},[(0,s._)("div",f,[(0,s._)("label",{for:`textGroup${r}Name`},"Grup Adı",8,b),(0,s.wy)((0,s._)("input",{"onUpdate:modelValue":t=>e.name=t,name:`group${r}Name`,id:`textGroup${r}Name`,type:"text",class:"w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 mt-1.5 form-input peer hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"},null,8,g),[[o.nr,e.name]])]),(0,s._)("div",y,[(0,s._)("label",{for:`textGroup${r}Size`},"Grup Boyutu",8,$),(0,s.wy)((0,s._)("input",{"onUpdate:modelValue":t=>e.size=t,name:`group${r}Size`,id:`textGroup${r}Size`,type:"number",min:"0",class:"w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 mt-1.5 form-input peer hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"},null,8,v),[[o.nr,e.size]])]),(0,s._)("div",w,[(0,s._)("button",{type:"button",class:"text-slate-400 h-9 w-9 transition-colors close hover:text-slate-800",title:t.$t("labels.delete"),onClick:t=>D.removeGroup(r)},x,8,k)])])))),128)),(0,s._)("div",A,[(0,s.Wm)(N,{color:"danger",size:8,onClick:D.removeGroup},{default:(0,s.w5)((()=>[(0,s.Uk)((0,i.zw)(t.$t("labels.delete_last_group")),1)])),_:1},8,["onClick"]),(0,s.Wm)(N,{color:"success",size:8,onClick:D.addGroup},{default:(0,s.w5)((()=>[(0,s.Uk)((0,i.zw)(t.$t("models.group.add")),1)])),_:1},8,["onClick"])])])]),(0,s._)("div",S,[(0,s.Wm)(N,{type:"submit",color:"primary",disabled:!z.form.isSubmittable()},{default:(0,s.w5)((()=>[(0,s.Uk)((0,i.zw)(t.$t("labels.submit")),1)])),_:1},8,["disabled"])])])],32)])])])],64)}r(7658);var D=r(2042),j=r(3459),E=r(4792),U={name:"WorkspaceForm",props:{id:{type:String,required:!1}},data(){return{breadcrumbs:[{title:this.$t("titles.workspaces"),route:"workspaces"},{title:this.id?this.$t("models.workspace.edit"):this.$t("models.workspace.add"),active:!0}],form:new j.Z({name:"",groups:[{name:"Grup 1",size:0}]})}},async created(){this.id&&await D.Z.get(`/workspace/${this.id}`).then((({data:t})=>{this.form.updateData(t)}))},methods:{addGroup(){this.form.groups.push({name:`${this.$t("titles.group")} ${this.form.groups.length+1}`,size:0})},removeGroup(t=null){this.form.groups.length>1&&this.form.groups.splice(t??this.form.groups.length-1,1)},submit(){this.form.isUpdate()?this.form.json().post("/workspace/update",this.form.getId()).then((()=>{E.Z.fire(this.$t("response.success.update"),"success")})).catch((()=>{E.Z.fire(this.form.getErrorMessage(),"error")})):this.form.json().post("/workspace/store").then((()=>{E.Z.fire(this.$t("response.success.store"),"success")})).catch((()=>{E.Z.fire(this.form.getErrorMessage(),"error")}))}}},N=r(89);const W=(0,N.Z)(U,[["render",z]]);var F=W}}]);
//# sourceMappingURL=315.d4bf69a3.js.map