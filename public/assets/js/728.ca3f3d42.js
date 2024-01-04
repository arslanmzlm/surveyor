(self["webpackChunksurveyor_front"]=self["webpackChunksurveyor_front"]||[]).push([[728],{5109:function(e,t,r){"use strict";var s=r(3316),i=r(4905);const{t:n,te:o}=i["default"].global;class a{constructor(){(0,s.Z)(this,"errors",{}),(0,s.Z)(this,"status",null),(0,s.Z)(this,"message","")}has(e){for(const t in this.errors)if(t===e)return!0;return!1}any(){return null!==this.errors&&void 0!==this.errors&&Object.keys(this.errors).length>0}get(e){return this.errors[e]?this.errors[e][0]:null}record(e){this.status=e.response.status??null,this.errors=void 0!==e.response.data.errors?e.response.data.errors:{},this.message=void 0!==e.response.data.message?e.response.data.message:""}clear(e=null){if(e)return delete this.errors[e],void(this.errors.length||(this.status=null,this.message=""));this.errors={},this.status=null,this.message=""}getMessage(){return null!==this.status&&o("response.errors."+this.status)?n("response.errors."+this.status):this.message}}t.Z=a},7084:function(e,t,r){"use strict";r.d(t,{Z:function(){return p}});var s=r(3316),i=(r(1379),r(6216)),n=r(4905),o=r(4850),a=r(5109),l=r(8805);const u=1500;var d=r(7342),c=r(9756);const{t:h}=n["default"].global;class b{constructor(e=null){(0,s.Z)(this,"errors",new a.Z),(0,s.Z)(this,"model",null),(0,s.Z)(this,"submittable",!0),(0,s.Z)(this,"defaultOptions",{showSuccessToast:!0,showFailToast:!0}),this.model=e}bind(e){this.model=e}getData(){const e=this.model?.getData();return this.hasFile(this.model)?(0,d.serialize)(e,{indices:!0,booleansAsIntegers:!0}):e}hasFile(e){for(const t in e){if(e[t]instanceof File||e[t]instanceof Blob)return!0;if(("object"===typeof e[t]&&null!==e[t]||(0,c.isArray)(e[t]))&&this.hasFile(e[t]))return!0}return!1}submit(e,t,r){this.beforeSubmit();const s=this.model,n=this.getData();return new Promise(((a,d)=>{i.Z[e](t,n).then((e=>{if(r.showSuccessToast&&o.Z.fire(h(`response.success.${r.action}`),"success"),"undefined"!==typeof r.action&&["store","update"].includes(r.action)&&s.saveAttributes(e.data),"undefined"!==typeof r.redirect){const e=r.redirect;r.idForRedirect&&this.model&&(e.params={id:this.model.id}),setTimeout((()=>{l.Z.push(e)}),u)}return a(e)})).catch((e=>(this.errors.record(e),r.showFailToast&&o.Z.fire(this.errors.getMessage(),"error"),d(e)))).finally((()=>{this.afterSubmit()}))}))}beforeSubmit(){this.submittable=!1}afterSubmit(){this.submittable=!0}store(e={}){const t=this.model;return e={...this.defaultOptions,action:"store",...e},this.submit("post",`${t.getMainRoute()}/store`,e)}update(e={}){const t=this.model;return e={...this.defaultOptions,action:"update",...e},this.submit("post",`${t.getMainRoute()}/update/${t.id}`,e)}delete(e={}){const t=this.model;return e={...this.defaultOptions,action:"delete",...e},this.submit("delete",`${t.getMainRoute()}/delete/${t.id}`,e)}}var p=b},7342:function(e){function t(e){return void 0===e}function r(e){return null===e}function s(e){return"boolean"===typeof e}function i(e){return e===Object(e)}function n(e){return Array.isArray(e)}function o(e){return e instanceof Date}function a(e,r){return r?i(e)&&!t(e.uri):i(e)&&"number"===typeof e.size&&"string"===typeof e.type&&"function"===typeof e.slice}function l(e,t){return a(e,t)&&"string"===typeof e.name&&(i(e.lastModifiedDate)||"number"===typeof e.lastModified)}function u(e){return!t(e)&&e}function d(e,c,h,b){c=c||{},h=h||new FormData,c.indices=u(c.indices),c.nullsAsUndefineds=u(c.nullsAsUndefineds),c.booleansAsIntegers=u(c.booleansAsIntegers),c.allowEmptyArrays=u(c.allowEmptyArrays),c.noAttributesWithArrayNotation=u(c.noAttributesWithArrayNotation),c.noFilesWithArrayNotation=u(c.noFilesWithArrayNotation),c.dotsForObjectNotation=u(c.dotsForObjectNotation);const p="function"===typeof h.getParts;return t(e)||(r(e)?c.nullsAsUndefineds||h.append(b,""):s(e)?c.booleansAsIntegers?h.append(b,e?1:0):h.append(b,e):n(e)?e.length?e.forEach(((e,t)=>{let r=b+"["+(c.indices?t:"")+"]";(c.noAttributesWithArrayNotation||c.noFilesWithArrayNotation&&l(e,p))&&(r=b),d(e,c,h,r)})):c.allowEmptyArrays&&h.append(c.noAttributesWithArrayNotation?b:b+"[]",""):o(e)?h.append(b,e.toISOString()):i(e)&&!a(e,p)?Object.keys(e).forEach((t=>{const r=e[t];if(n(r))while(t.length>2&&t.lastIndexOf("[]")===t.length-2)t=t.substring(0,t.length-2);const s=b?c.dotsForObjectNotation?b+"."+t:b+"["+t+"]":t;d(r,c,h,s)})):h.append(b,e)),h}e.exports={serialize:d}},5728:function(e,t,r){"use strict";r.r(t),r.d(t,{default:function(){return x}});var s=r(3723),i=r(4719),n=r(4386);const o={class:"p-4 card xl:p-5"},a={class:"space-y-4"},l={for:"textName"},u={class:"relative flex mt-1.5"},d={class:"pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:peer-focus:text-accent dark:text-navy-300"},c={class:"inline-flex items-center space-x-2"},h={class:"rounded-lg border border-slate-200 p-4 space-y-2 dark:border-navy-600"},b={class:"inline-flex items-center space-x-2"},p=["value"],m={class:"text-end space-x-3"},f={class:"mt-4 p-4 card"};function y(e,t,r,y,g,v){const k=(0,s.up)("breadcrumb-list"),w=(0,s.up)("v-icon"),_=(0,s.up)("validation-feedback"),A=(0,s.up)("v-button");return(0,s.wg)(),(0,s.iD)(s.HY,null,[(0,s.Wm)(k,{items:g.breadcrumbs},null,8,["items"]),(0,s._)("div",o,[(0,s._)("form",{onInput:t[3]||(t[3]=e=>g.request.errors.clear(e.target.name)),onSubmit:t[4]||(t[4]=(0,i.iM)((e=>v.submit()),["prevent"]))},[(0,s._)("div",a,[(0,s._)("div",null,[(0,s._)("label",l,(0,n.zw)(e.$t("attributes.name")),1),(0,s._)("span",u,[(0,s.wy)((0,s._)("input",{"onUpdate:modelValue":t[0]||(t[0]=e=>g.role.name=e),id:"textName",name:"name",type:"text",class:"w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 form-input peer hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent",autocomplete:"off"},null,512),[[i.nr,g.role.name]]),(0,s._)("span",d,[(0,s.Wm)(w,{name:"finger-print",size:"6"})])]),(0,s.Wm)(_,null,{default:(0,s.w5)((()=>[(0,s.Uk)((0,n.zw)(g.request.errors.get("name")),1)])),_:1})]),(0,s._)("div",null,[(0,s._)("label",c,[(0,s.wy)((0,s._)("input",{"onUpdate:modelValue":t[1]||(t[1]=e=>g.role.is_admin=e),class:"h-4 w-4 rounded border-slate-400/70 form-checkbox is-basic checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent",type:"checkbox"},null,512),[[i.e8,g.role.is_admin]]),(0,s._)("span",null,(0,n.zw)(e.$t("labels.is_admin")),1)]),(0,s.Wm)(_,null,{default:(0,s.w5)((()=>[(0,s.Uk)((0,n.zw)(g.request.errors.get("is_admin")),1)])),_:1})]),(0,s._)("div",h,[((0,s.wg)(!0),(0,s.iD)(s.HY,null,(0,s.Ko)(g.abilities,(r=>((0,s.wg)(),(0,s.iD)("div",{key:r.id},[(0,s._)("span",null,[(0,s._)("label",b,[(0,s.wy)((0,s._)("input",{"onUpdate:modelValue":t[2]||(t[2]=e=>g.role.abilities=e),class:"h-4 w-4 rounded border-slate-400/70 form-checkbox is-basic checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent",type:"checkbox",value:r.id},null,8,p),[[i.e8,g.role.abilities]]),(0,s._)("span",null,(0,n.zw)(e.$t(`roles.abilities.${r.name}`)),1)])])])))),128))]),(0,s.Wm)(_,null,{default:(0,s.w5)((()=>[(0,s.Uk)((0,n.zw)(g.request.errors.get("abilities")),1)])),_:1}),(0,s._)("div",m,[(0,s.Wm)(A,{type:"submit",color:"primary",disabled:!g.request.submittable},{default:(0,s.w5)((()=>[(0,s.Uk)((0,n.zw)(e.$t("labels.submit")),1)])),_:1},8,["disabled"])])])],32)]),(0,s._)("div",f,(0,n.zw)(JSON.stringify(this.role)),1)],64)}var g=r(4804),v=r(4872),k=r(7084),w={name:"RoleCreate",data(){return{breadcrumbs:[{title:this.$t("titles.roles"),route:"admin.roles"},{title:this.$t("models.role.add"),active:!0}],abilities:new g["default"],role:new v.Z,request:new k.Z}},created(){this.abilities.fetchAll(),this.request.bind(this.role)},methods:{submit(){this.request.store({redirect:{name:"admin.roles"}})}}},_=r(8380);const A=(0,_.Z)(w,[["render",y]]);var x=A}}]);
//# sourceMappingURL=728.ca3f3d42.js.map