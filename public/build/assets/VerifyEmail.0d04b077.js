import{_ as s}from"./AuthLayout.835bb857.js";import{o,i as r,w as e,a,b as i,d as n,L as d,h as c}from"./app.a35cdf6d.js";const l=a("div",{class:"text-center mb-4"},[a("a",{href:".",class:"navbar-brand navbar-brand-autodark"},[a("img",{src:"static/logo.svg",height:"36",alt:""})])],-1),_={class:"card card-md",action:".",method:"get"},m={class:"card-body"},u=a("h2",{class:"card-title text-center mb-4"},"E-Posta adresinizi do\u011Frulay\u0131n",-1),h=a("p",{class:"text-muted mb-4"},"E-Posta gelen kutunuzu kontrol edin. Hesab\u0131n\u0131z\u0131 do\u011Frulaman\u0131z i\xE7in size bir e-posta g\xF6nderdik. G\xF6nderdi\u011Fimiz e-posta i\xE7erisindeki do\u011Frulama linkini kullan\u0131n.",-1),b=c(" Tekrar g\xF6nder. "),v={__name:"VerifyEmail",setup(f){return(t,p)=>(o(),r(s,{title:"E-Posta Do\u011Frula"},{default:e(()=>[l,a("form",_,[a("div",m,[u,h,a("div",null,[i(n(d),{href:t.route("verification.send"),method:"post",as:"button",class:"btn btn-primary w-100"},{default:e(()=>[b]),_:1},8,["href"])])])])]),_:1}))}};export{v as default};