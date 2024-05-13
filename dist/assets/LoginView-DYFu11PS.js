import{r as O,_ as I,a as _,u as A,o as L,b as R,c,d as l,e as s,w as b,v as K,f as x,g as y,t as C,h as w,i as F,j as G,k as $,n as P,T as J,p as U,l as V,m as j,q as z}from"./index-Dfh-TRdF.js";var E={expireTimes:"1d",path:"; path=/",domain:"",secure:!1,sameSite:"; SameSite=Lax"},H=function(){function n(){this.current_default_config=E}return n.prototype.config=function(t){for(var e in this.current_default_config)this.current_default_config[e]=t[e]?t[e]:E[e]},n.prototype.get=function(t){var e=decodeURIComponent(document.cookie.replace(new RegExp("(?:(?:^|.*;)\\s*"+encodeURIComponent(t).replace(/[\-\.\+\*]/g,"\\$&")+"\\s*\\=\\s*([^;]*).*$)|^.*$"),"$1"))||null;if(e&&e.substring(0,1)==="{"&&e.substring(e.length-1,e.length)==="}")try{e=JSON.parse(e)}catch{return e}return e},n.prototype.set=function(t,e,o,f,p,h,i){if(t){if(/^(?:expires|max-age|path|domain|secure|SameSite)$/i.test(t))throw new Error('Cookie name illegality. Cannot be set to ["expires","max-age","path","domain","secure","SameSite"]	 current key name: '+t)}else throw new Error("Cookie name is not found in the first argument.");e&&e.constructor===Object&&(e=JSON.stringify(e));var r="";if(o==null&&(o=this.current_default_config.expireTimes?this.current_default_config.expireTimes:""),o&&o!=0)switch(o.constructor){case Number:o===1/0||o===-1?r="; expires=Fri, 31 Dec 9999 23:59:59 GMT":r="; max-age="+o;break;case String:if(/^(?:\d+(y|m|d|h|min|s))$/i.test(o)){var u=o.replace(/^(\d+)(?:y|m|d|h|min|s)$/i,"$1");switch(o.replace(/^(?:\d+)(y|m|d|h|min|s)$/i,"$1").toLowerCase()){case"m":r="; max-age="+ +u*2592e3;break;case"d":r="; max-age="+ +u*86400;break;case"h":r="; max-age="+ +u*3600;break;case"min":r="; max-age="+ +u*60;break;case"s":r="; max-age="+u;break;case"y":r="; max-age="+ +u*31104e3;break}}else r="; expires="+o;break;case Date:r="; expires="+o.toUTCString();break}return document.cookie=encodeURIComponent(t)+"="+encodeURIComponent(e)+r+(p?"; domain="+p:this.current_default_config.domain?this.current_default_config.domain:"")+(f?"; path="+f:this.current_default_config.path?this.current_default_config.path:"; path=/")+(h==null?this.current_default_config.secure?"; Secure":"":h?"; Secure":"")+(i==null?this.current_default_config.sameSite?"; SameSute="+this.current_default_config.sameSite:"":i?"; SameSite="+i:""),this},n.prototype.remove=function(t,e,o){return!t||!this.isKey(t)?!1:(document.cookie=encodeURIComponent(t)+"=; expires=Thu, 01 Jan 1970 00:00:00 GMT"+(o?"; domain="+o:this.current_default_config.domain?this.current_default_config.domain:"")+(e?"; path="+e:this.current_default_config.path?this.current_default_config.path:"; path=/")+"; SameSite=Lax",!0)},n.prototype.isKey=function(t){return new RegExp("(?:^|;\\s*)"+encodeURIComponent(t).replace(/[\-\.\+\*]/g,"\\$&")+"\\s*\\=").test(document.cookie)},n.prototype.keys=function(){if(!document.cookie)return[];for(var t=document.cookie.replace(/((?:^|\s*;)[^\=]+)(?=;|$)|^\s*|\s*(?:\=[^;]*)?(?:\1|$)/g,"").split(/\s*(?:\=[^;]*)?;\s*/),e=0;e<t.length;e++)t[e]=decodeURIComponent(t[e]);return t},n}(),k=null;function N(){k==null&&(k=new H);var n=O(k);return{cookies:n}}const q=n=>(U("data-v-07d1e9f6"),n=n(),V(),n),Q={class:"login-form"},W={class:"email-wrapper"},X=q(()=>s("br",null,null,-1)),Y={key:0,class:"error"},Z={key:0,class:"password-wrapper"},T=["type"],ee={key:0,class:"error"},te={key:0},oe={key:1,class:"loader"},ne={__name:"Form",setup(n){const t=_(""),e=_(""),o=_(!1),f=_(!1),p=_(!1),h=A();N();const i=_({email:"",password:""});L(()=>{window.addEventListener("resize",u);let d=document.getElementsByName("email")[0];d.addEventListener("focus",r),d.focus()});function r(){i.value.email="",i.value.password=""}function u(){window.location.reload()}function M(){if(t.value==""){i.value.email="Email can not be blank";return}f.value=!0,setTimeout(()=>{let d=document.getElementsByName("password")[0];d.addEventListener("focus",r),d.focus()},0)}function S(){if(e.value==""){i.value.password="Enter your password";return}let d={email:t.value,password:e.value};o.value=!0,J.getToken(d).then(a=>{o.value=!1,a.data.data.token!=null&&a.data.data.token!=""&&(localStorage.setItem("token",a.data.data.token),setTimeout(()=>{h.push({name:"dashboard"})},0))}).catch(a=>{console.log(a),o.value=!1})}function B(){f.value=!1,e.value=""}function D(){p.value=!p.value}return(d,a)=>{const v=R("font-awesome-icon");return c(),l("div",Q,[s("div",W,[b(s("input",{name:"email",placeholder:"Enter your email",type:"email","onUpdate:modelValue":a[0]||(a[0]=m=>t.value=m)},null,512),[[K,t.value]]),x(),X,s("div",{onClick:B,class:"email-edit-ic"},[y(v,{icon:"fa-solid fa-pencil"})]),i.value.email!==""?(c(),l("span",Y,C(i.value.email),1)):w("",!0)]),f.value?(c(),l("div",Z,[b(s("input",{onKeyup:a[1]||(a[1]=G(m=>S(),["enter"])),name:"password",placeholder:"Enter your password",type:p.value?"text":"password","onUpdate:modelValue":a[2]||(a[2]=m=>e.value=m)},null,40,T),[[F,e.value]]),s("div",{onClick:D,class:"password-show-ic"},[p.value?(c(),$(v,{key:0,icon:"fa-solid fa-eye"})):(c(),$(v,{key:1,icon:"fa-solid fa-eye-slash"}))]),i.value.password!==""?(c(),l("span",ee,C(i.value.password),1)):w("",!0)])):w("",!0),f.value?(c(),l("button",{key:2,onClick:a[4]||(a[4]=m=>S()),style:P({"background-color":o.value?"#424141":""})},[o.value?(c(),l("div",oe)):(c(),l("span",te,"Log in"))],4)):(c(),l("button",{key:1,onClick:a[3]||(a[3]=m=>M())},"Continue"))])}}},ae=I(ne,[["__scopeId","data-v-07d1e9f6"]]),g=n=>(U("data-v-cec95a45"),n=n(),V(),n),se={class:"login-wrapper"},re=g(()=>s("h3",null,"Log in to continue",-1)),ie=g(()=>s("h4",null,"Or continue with:",-1)),ce=g(()=>s("div",{class:"login-method"},[s("button",null,"Microsoft"),s("button",null,"Apple"),s("button",null,"Slack")],-1)),le=g(()=>s("div",{class:"register"},[s("a",{href:""},"Can't log in ?"),s("a",{href:""},"Create an account")],-1)),ue={__name:"LoginView",setup(n){return L(()=>{j().then(t=>{const e=z(t.credential);console.log("Handle the userData",e)}).catch(t=>{console.log("Handle the error",t)})}),(t,e)=>{const o=R("font-awesome-icon");return c(),l("div",se,[s("h1",null,[y(o,{icon:"fa-solid fa-chart-simple"}),x(" TodoApp")]),re,y(ae),ie,ce,le])}}},fe=I(ue,[["__scopeId","data-v-cec95a45"]]);export{fe as default};