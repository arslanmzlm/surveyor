(self["webpackChunksurveyor_front"]=self["webpackChunksurveyor_front"]||[]).push([[807],{5109:function(t,e,r){"use strict";var s=r(3316),a=r(4905);const{t:i,te:n}=a["default"].global;class o{constructor(){(0,s.Z)(this,"errors",{}),(0,s.Z)(this,"status",null),(0,s.Z)(this,"message","")}has(t){for(const e in this.errors)if(e===t)return!0;return!1}any(){return null!==this.errors&&void 0!==this.errors&&Object.keys(this.errors).length>0}get(t){return this.errors[t]?this.errors[t][0]:null}record(t){this.status=t.response.status??null,this.errors=void 0!==t.response.data.errors?t.response.data.errors:{},this.message=void 0!==t.response.data.message?t.response.data.message:""}clear(t=null){if(t)return delete this.errors[t],void(this.errors.length||(this.status=null,this.message=""));this.errors={},this.status=null,this.message=""}getMessage(){return null!==this.status&&n("response.errors."+this.status)?i("response.errors."+this.status):this.message}}e.Z=o},7342:function(t){function e(t){return void 0===t}function r(t){return null===t}function s(t){return"boolean"===typeof t}function a(t){return t===Object(t)}function i(t){return Array.isArray(t)}function n(t){return t instanceof Date}function o(t,r){return r?a(t)&&!e(t.uri):a(t)&&"number"===typeof t.size&&"string"===typeof t.type&&"function"===typeof t.slice}function l(t,e){return o(t,e)&&"string"===typeof t.name&&(a(t.lastModifiedDate)||"number"===typeof t.lastModified)}function u(t){return!e(t)&&t}function d(t,c,h,p){c=c||{},h=h||new FormData,c.indices=u(c.indices),c.nullsAsUndefineds=u(c.nullsAsUndefineds),c.booleansAsIntegers=u(c.booleansAsIntegers),c.allowEmptyArrays=u(c.allowEmptyArrays),c.noAttributesWithArrayNotation=u(c.noAttributesWithArrayNotation),c.noFilesWithArrayNotation=u(c.noFilesWithArrayNotation),c.dotsForObjectNotation=u(c.dotsForObjectNotation);const f="function"===typeof h.getParts;return e(t)||(r(t)?c.nullsAsUndefineds||h.append(p,""):s(t)?c.booleansAsIntegers?h.append(p,t?1:0):h.append(p,t):i(t)?t.length?t.forEach(((t,e)=>{let r=p+"["+(c.indices?e:"")+"]";(c.noAttributesWithArrayNotation||c.noFilesWithArrayNotation&&l(t,f))&&(r=p),d(t,c,h,r)})):c.allowEmptyArrays&&h.append(c.noAttributesWithArrayNotation?p:p+"[]",""):n(t)?h.append(p,t.toISOString()):a(t)&&!o(t,f)?Object.keys(t).forEach((e=>{const r=t[e];if(i(r))while(e.length>2&&e.lastIndexOf("[]")===e.length-2)e=e.substring(0,e.length-2);const s=p?c.dotsForObjectNotation?p+"."+e:p+"["+e+"]":e;d(r,c,h,s)})):h.append(p,t)),h}t.exports={serialize:d}},3807:function(t,e,r){"use strict";r.r(e),r.d(e,{default:function(){return W}});var s=r(3723),a=r(4719),i=r(4386);const n={class:"grid w-full grow grid-cols-1 place-items-center"},o={class:"w-full p-4 max-w-[28rem] sm:px-5"},l=(0,s._)("div",{class:"text-center"},[(0,s._)("img",{class:"mx-auto w-80",src:"/logo.png",alt:"logo"})],-1),u={class:"mt-5 rounded-lg p-5 card space-y-4 lg:p-7"},d={for:"textUsername"},c={class:"relative flex mt-1.5"},h=["placeholder"],p={class:"pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:peer-focus:text-accent dark:text-navy-300"},f={for:"textPassword"},m={class:"relative flex mt-1.5"},b=["placeholder"],g={class:"pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:peer-focus:text-accent dark:text-navy-300"},y={class:"flex items-center justify-between space-x-2"},$={class:"inline-flex cursor-pointer items-center space-x-2"},v=(0,s._)("input",{class:"h-5 w-5 rounded border-slate-400/70 form-checkbox is-basic checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent",type:"checkbox"},null,-1),w={class:"line-clamp-1"},x={href:"#",class:"text-xs text-slate-400 transition-colors line-clamp-1 hover:text-slate-800 focus:text-slate-800 dark:text-navy-300 dark:hover:text-navy-100 dark:focus:text-navy-100"},k={class:"text-sm text-error"},_=["disabled"];function A(t,e,r,A,j,D){const z=(0,s.up)("v-icon");return(0,s.wg)(),(0,s.iD)("main",n,[(0,s._)("div",o,[l,(0,s._)("form",{onSubmit:e[2]||(e[2]=(0,a.iM)((t=>D.login()),["prevent"])),onInput:e[3]||(e[3]=t=>j.form.clearError(t.target.name))},[(0,s._)("div",u,[(0,s._)("div",null,[(0,s._)("label",d,(0,i.zw)(t.$t("attributes.username")),1),(0,s._)("span",c,[(0,s.wy)((0,s._)("input",{"onUpdate:modelValue":e[0]||(e[0]=t=>j.form.username=t),id:"textUsername",type:"text",name:"username",class:"w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 form-input peer hover:z-10 hover:border-slate-400 focus:border-primary focus:z-10 dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent",placeholder:t.$t("placeholder.username")},null,8,h),[[a.nr,j.form.username]]),(0,s._)("span",p,[(0,s.Wm)(z,{name:"user",size:"5"})])])]),(0,s._)("div",null,[(0,s._)("label",f,(0,i.zw)(t.$t("attributes.password")),1),(0,s._)("span",m,[(0,s.wy)((0,s._)("input",{"onUpdate:modelValue":e[1]||(e[1]=t=>j.form.password=t),id:"textPassword",type:"password",name:"password",class:"w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 form-input peer hover:z-10 hover:border-slate-400 focus:border-primary focus:z-10 dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent",placeholder:t.$t("placeholder.password")},null,8,b),[[a.nr,j.form.password]]),(0,s._)("span",g,[(0,s.Wm)(z,{name:"key",size:"5"})])])]),(0,s._)("div",y,[(0,s._)("label",$,[v,(0,s._)("span",w,(0,i.zw)(t.$t("auth.remember_me")),1)]),(0,s._)("a",x,(0,i.zw)(t.$t("auth.forgot_password")),1)]),(0,s._)("div",k,(0,i.zw)(j.form.getErrorMessage()),1),(0,s._)("button",{type:"submit",disabled:!j.form.isSubmittable(),class:"w-full font-medium text-white btn bg-primary hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"},(0,i.zw)(t.$t("auth.login")),9,_)])],32)])])}r(1379);var j=r(6216),D=r(5109),z=r(7342),E=r(9756);class I{constructor(t={}){this.$data=t,this.$errors=new D.Z,this.$canSubmit=!0,this.$multipart=!1,this.$json=!1,this.$id=t["id"]??null;for(let e in t)this[e]=t[e]}setData(t){for(let e in this.$data)delete this[e];this.$data=t;for(let e in t)this[e]=t[e];this.$id=t["id"]??null,this.clearError()}updateData(t){for(let e in this.$data){if((0,E.isArray)(t[e])&&t[e].length>0&&null!==t[e][0]&&"object"===typeof t[e][0]&&Object.hasOwn(t[e][0],"id")){let r=[];t[e].forEach((t=>{r.push(t.id)})),this[e]=r}else this[e]=t[e];this.$data[e]=t[e]}this.$id=t["id"]??null,this.clearError()}setId(t){this.$id=t}getId(){return this.$id}deleteData(){for(let t in this.$data)delete this[t];this.$data={}}setFile(t,e,r=!1){if("object"===typeof e){if(this.$multipart=!0,r)return this[t]=e,!0;if(e[0]instanceof File)return this[t]=e[0],!0}return!1}getHeaders(){let t={};return this.$multipart&&(t["Content-Type"]="multipart/form-data"),t}getData(){let t={};for(let e in this.$data)t[e]=this[e];return t}formData(){let t={indices:!0,booleansAsIntegers:!0,allowEmptyArrays:!0};return(0,z.serialize)(this.getData(),t)}jsonData(){let t={};for(let e in this.$data)null!==this[e]&&"undefined"!==typeof this[e]&&(t[e]=this[e]);return t}addData(t,e){this[t]?this[t]=e:(this[t]=e,this.$data[t]=e)}isSubmittable(){return this.$canSubmit}isUpdate(){return null!==this.$id}json(){return this.$json=!0,this}isJson(){return this.$json}store(t){return this.submit("post",`${t}/store`)}update(t){return this.submit("post",`${t}/update/${this.getId()}`)}post(t,e=null){return"string"===typeof e||"number"===typeof e?this.submit("post",`${t}/${e}`):this.submit("post",t)}put(t,e=null){return e?this.submit("put",`${t}/${e}`):this.submit("put",`${t}/${this.getId()}`)}patch(t,e=null){return e?this.submit("patch",`${t}/${e}`):this.submit("patch",`${t}/${this.getId()}`)}delete(t,e=null){return e?this.submit("delete",`${t}/delete/${e}`):this.submit("delete",`${t}/delete/${this.getId()}`)}submit(t,e){this.beforeSubmit();let r=this.isJson()?this.jsonData():this.formData(),s={headers:this.getHeaders()};return new Promise(((a,i)=>{j.Z[t](e,r,s).then((t=>{this.onSuccess(t.data),a(t.data)})).catch((t=>{this.onFail(t),i(t.response.data)})).finally((()=>{this.afterSubmit()}))}))}reset(){let t=this.getId()?{id:this.getId(),...this.$data}:{...this.$data};this.updateData(t),this.$errors.clear()}hasError(t){return this.$errors.has(t)}getErrorMessage(){return this.$errors.getMessage()}getError(t){return this.$errors.get(t)}clearError(t=null){return this.$errors.clear(t)}beforeSubmit(){this.$canSubmit=!1}afterSubmit(){this.$canSubmit=!0}onSuccess(t){this.updateData(t),this.$errors.clear()}onFail(t){this.$errors.record(t)}}var S=I,F={name:"LoginPage",data(){return{form:new S({username:"",password:""})}},methods:{login(){this.form.post("/login").then((async t=>{await this.$store.dispatch("login",t),!0===this.$store.getters.is_admin?this.$router.push({name:"admin.dashboard"}):this.$router.push({name:"app.dashboard"})}))}}},N=r(8380);const O=(0,N.Z)(F,[["render",A]]);var W=O}}]);
//# sourceMappingURL=807.13a6bffc.js.map