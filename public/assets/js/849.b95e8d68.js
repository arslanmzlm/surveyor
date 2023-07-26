"use strict";(self["webpackChunksurveyor_front"]=self["webpackChunksurveyor_front"]||[]).push([[849],{4792:function(e,t,s){var o=s(4677);class r{constructor(){this.toast=(0,o.pm)(),this.config={position:"bottom-center",timeout:5e3,closeOnClick:!0,pauseOnFocusLoss:!0,pauseOnHover:!0,showCloseButtonOnHover:!1,closeButton:"button",icon:!0}}fire(e,t="info",s={}){this.toast[t](e,{...this.config,...s})}}t["Z"]=new r},6849:function(e,t,s){s.r(t),s.d(t,{default:function(){return z}});var o=s(3396),r=s(7139),a=s(9242);const l=(0,o._)("i",{class:"fa fa-plus fa-sm fa-fw"},null,-1),i={class:"py-3"},c={class:"grid grid-cols-1"},n={class:"block"},d={for:"textSearch"},u={class:"w-full mt-1.5"},f=["placeholder"],p={class:"font-medium text-slate-700 dark:text-navy-100"},m={class:"font-medium text-slate-700 dark:text-navy-100"},b={class:"font-medium text-slate-700 dark:text-navy-100"},h={key:"isWorkspaceHasGroup",class:"list-disc"},w={class:"flex space-x-2"};function k(e,t,s,k,g,v){const y=(0,o.up)("router-link"),_=(0,o.up)("breadcrumb-list"),$=(0,o.up)("v-icon"),x=(0,o.up)("v-button"),z=(0,o.up)("data-table"),W=(0,o.up)("v-modal");return(0,o.wg)(),(0,o.iD)(o.HY,null,[(0,o.Wm)(_,{items:g.breadcrumbs},{default:(0,o.w5)((()=>[(0,o.Wm)(y,{to:{name:"workspace.create"},class:"font-medium text-white btn btn-sm bg-info hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90"},{default:(0,o.w5)((()=>[l,(0,o.Uk)(" "+(0,r.zw)(e.$t("labels.add")),1)])),_:1},8,["to"])])),_:1},8,["items"]),(0,o.Wm)(z,{titles:g.titles,repository:g.repository},{filters:(0,o.w5)((()=>[(0,o._)("div",i,[(0,o._)("div",c,[(0,o._)("div",n,[(0,o._)("label",d,(0,r.zw)(e.$t("attributes.name")),1),(0,o._)("div",u,[(0,o.wy)((0,o._)("input",{"onUpdate:modelValue":t[0]||(t[0]=e=>g.repository.filters.search=e),id:"textSearch",type:"text",placeholder:e.$t("placeholder.search"),class:"w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 form-input hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"},null,8,f),[[a.nr,g.repository.filters.search]])])])])])])),body:(0,o.w5)((()=>[((0,o.wg)(!0),(0,o.iD)(o.HY,null,(0,o.Ko)(g.repository.getItems(),(t=>((0,o.wg)(),(0,o.iD)("tr",{key:t.id},[(0,o._)("td",p,(0,r.zw)(t.id),1),(0,o._)("td",m,(0,r.zw)(t.name),1),(0,o._)("td",b,[t.groups?((0,o.wg)(),(0,o.iD)("ol",h,[((0,o.wg)(!0),(0,o.iD)(o.HY,null,(0,o.Ko)(t.groups,((e,t)=>((0,o.wg)(),(0,o.iD)("li",{key:t},(0,r.zw)(e.name)+" - "+(0,r.zw)(e.size),1)))),128))])):(0,o.kq)("",!0)]),(0,o._)("td",null,[(0,o._)("div",w,[(0,o.Wm)(y,{to:{name:"workspace.edit",params:{id:t.id}},title:e.$t("labels.edit"),class:"h-10 w-10 rounded-full p-0 font-medium text-white btn bg-primary hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"},{default:(0,o.w5)((()=>[(0,o.Wm)($,{name:"pencil-square",size:"5"})])),_:2},1032,["to","title"]),(0,o.Wm)(x,{color:"error",icon:"",size:10,title:e.$t("labels.delete"),onClick:e=>v.deleteModal(t.id)},{default:(0,o.w5)((()=>[(0,o.Wm)($,{name:"archive-delete",size:"5"})])),_:2},1032,["title","onClick"])])])])))),128))])),_:1},8,["titles","repository"]),(0,o.Wm)(W,{ref:"modal"},{title:(0,o.w5)((()=>[(0,o.Uk)((0,r.zw)(e.$t("modal.titles.delete")),1)])),body:(0,o.w5)((()=>[(0,o.Uk)((0,r.zw)(e.$t("modal.messages.delete")),1)])),buttons:(0,o.w5)((()=>[(0,o.Wm)(x,{color:"error",onClick:v.deleteData},{default:(0,o.w5)((()=>[(0,o.Uk)((0,r.zw)(e.$t("labels.delete")),1)])),_:1},8,["onClick"])])),_:1},512)],64)}var g=s(306),v=s(2042),y=s(4792),_={name:"WorkspaceList",data(){return{breadcrumbs:[{title:this.$t("titles.workspaces"),active:!0}],titles:[{column:"id",title:"#",sortable:!0},{column:"name",title:this.$t("attributes.workspace"),sortable:!0},{title:this.$t("titles.groups")},{title:this.$t("labels.actions")}],repository:new g.Z("/workspaces",{search:""}),delete:null}},methods:{deleteModal(e){this.delete=e,this.$refs.modal.toggle()},deleteData(){v.Z.post(`/workspace/delete/${this.delete}`).then((()=>{y.Z.fire(this.$t("response.success.delete"),"success"),this.$refs.modal.toggle(),this.repository.fetch()})).catch((e=>{y.Z.fire(this.$t("response.errors."+e.response.status),"error")}))}},created(){this.repository.fetch()}},$=s(89);const x=(0,$.Z)(_,[["render",k]]);var z=x}}]);
//# sourceMappingURL=849.b95e8d68.js.map