<%-- 
    Document   : index
    Created on : 12/09/2014, 05:45:54 PM
    Author     : Daniel
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<%@include file="env_vars.jsp" %>
<html>
    <head>
        <%@include file="librerias.html" %>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>::  ACSA SYSTEMS ::</title>
        <style>
            .thumbnails {
                text-align: center;
                border: 0 none !important;
                box-shadow: none;
            }
            .thumbnails > li {
                width: 200px;
                //height: 100%;
                background: white;
                float: none !important; /* to overwrite the default property on the bootstrap stylesheet */
                display: inline-block;
                *display: inline; /* ie7 support */
                zoom: 1;
            }
            .row .thumbnail {
                border:0;
                box-shadow:0;
                border-radius:0;
            }
        </style>
    </head>
    <body>

        <div class="well well-lg"><h2 class="text-center"><strong>DIRECTORIO DE APLICACIONES ACSA</strong></h2></div>
        <div>
            <ul class="thumbnails">
                <li ><a href="/acsa"><img src="img/btn_exteneo.png" class="img-thumbnail"></a></li>
                <li ><a href="/paymng" ><img src="img/loga1.png" class="img-thumbnail"></a></li>
                <li ><a href="/regproy" ><img src="img/btn_regproy.png" class="img-thumbnail"></a></li>
                <li ><a href="/info" ><img src="img/subcontratistas_intranet.png" class="img-thumbnail"></a></li>
                <li ><a href="/cobranza" ><img src="img/cobranza.png" class="img-thumbnail"></a></li>
                <li ><a href="/gerencia" ><img src="img/btn_gerencia.png" class="img-thumbnail"></a></li>
                <li ><a href="/coninfi" ><img src="img/btn_coninfi.jpg" class="img-thumbnail"></a></li>
            </ul>
        </div>
    </body>
</html>
