import{_ as $,r as m,u as F,a as P,o as S,b as w,c as s,d as l,e,w as b,v as U,f as I,g as v,t as L,h as f,i as z,j as G,k as E,n as A,T as H,U as C,p as x,l as T,m as K,q as j,s as q,x as O,y as R,z as J}from"./index-CLukMurB.js";const Q=t=>(x("data-v-d8942974"),t=t(),T(),t),W={class:"login-form"},X={class:"email-wrapper"},Y=Q(()=>e("br",null,null,-1)),Z={key:0,class:"error"},ee={key:0,class:"password-wrapper"},oe=["type"],ae={key:0,class:"error"},se={key:0},te={key:1,class:"loader"},ne={__name:"Form",setup(t){const n=m(""),d=m(""),a=m(!1),c=m(!1),p=m(!1),h=F(),V=P(),i=m({email:"",password:""});S(()=>{window.addEventListener("resize",M);let r=document.getElementsByName("email")[0];r.addEventListener("focus",k),r.focus()});function k(){i.value.email="",i.value.password=""}function M(){window.location.reload()}function B(){if(n.value==""){i.value.email="Email can not be blank";return}c.value=!0,setTimeout(()=>{let r=document.getElementsByName("password")[0];r.addEventListener("focus",k),r.focus()},0)}function y(){if(d.value==""){i.value.password="Enter your password";return}let r={email:n.value,password:d.value};a.value=!0,H.getToken(r).then(o=>{a.value=!1,o.data.data.token!=null&&o.data.data.token!=""&&(localStorage.setItem("token",o.data.data.token),setTimeout(()=>{h.push({name:"dashboard"})},0),V.addMessage("Login Success"))}).catch(o=>{C.isIncorrectCredential(o),a.value=!1})}function N(){c.value=!1,d.value=""}function D(){p.value=!p.value}return(r,o)=>{const g=w("font-awesome-icon");return s(),l("div",W,[e("div",X,[b(e("input",{name:"email",placeholder:"Enter your email",type:"email","onUpdate:modelValue":o[0]||(o[0]=_=>n.value=_)},null,512),[[U,n.value]]),I(),Y,e("div",{onClick:N,class:"email-edit-ic"},[v(g,{icon:"fa-solid fa-pencil"})]),i.value.email!==""?(s(),l("span",Z,L(i.value.email),1)):f("",!0)]),c.value?(s(),l("div",ee,[b(e("input",{onKeyup:o[1]||(o[1]=G(_=>y(),["enter"])),name:"password",placeholder:"Enter your password",type:p.value?"text":"password","onUpdate:modelValue":o[2]||(o[2]=_=>d.value=_)},null,40,oe),[[z,d.value]]),e("div",{onClick:D,class:"password-show-ic"},[p.value?(s(),E(g,{key:0,icon:"fa-solid fa-eye"})):(s(),E(g,{key:1,icon:"fa-solid fa-eye-slash"}))]),i.value.password!==""?(s(),l("span",ae,L(i.value.password),1)):f("",!0)])):f("",!0),c.value?(s(),l("button",{key:2,onClick:o[4]||(o[4]=_=>y()),style:A({"background-color":a.value?"#424141":""})},[a.value?(s(),l("div",te)):(s(),l("span",se,"Log in"))],4)):(s(),l("button",{key:1,onClick:o[3]||(o[3]=_=>B())},"Continue"))])}}},le=$(ne,[["__scopeId","data-v-d8942974"]]),u=t=>(x("data-v-02cfd88e"),t=t(),T(),t),ie={key:0,class:"login-wrapper"},re=u(()=>e("h3",null,"Log in to continue",-1)),de=u(()=>e("h4",null,"Or continue with:",-1)),ce={class:"login-method"},ue=u(()=>e("button",null,"Google",-1)),pe=u(()=>e("button",null,"Microsoft",-1)),_e=u(()=>e("button",null,"Apple",-1)),me=u(()=>e("button",null,"Slack",-1)),ve=u(()=>e("div",{class:"register"},[e("a",{href:""},"Can't log in ?"),e("a",{href:""},"Create an account")],-1)),fe={__name:"LoginView",setup(t){const n=K();S(()=>{d(),j().then(a=>{const c=q(a.credential);console.log("Handle the userData",c)}).catch(a=>{console.log("Handle the error",a)})});function d(){n.loading.page=!0,C.getInfor().then(a=>{n.disableLoading("page"),O.push({name:"dashboard"})}).catch(a=>{n.disableLoading("page")})}return(a,c)=>{const p=w("font-awesome-icon"),h=w("GoogleLogin");return R(n).loading.page==!1?(s(),l("div",ie,[e("h1",null,[v(p,{icon:"fa-solid fa-chart-simple"}),I(" TodoApp")]),re,v(le),de,e("div",ce,[v(h,null,{default:J(()=>[ue]),_:1}),pe,_e,me]),ve])):f("",!0)}}},ge=$(fe,[["__scopeId","data-v-02cfd88e"]]);export{ge as default};
