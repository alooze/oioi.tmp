@extends('layouts.lte')

@section('title', 'Admin panel')

@section('custom_css')
<style type="text/css">
    tfoot {
        display: table-header-group !important;
    }
    table{
        width: 100%;
    }
    .actions{
        width: 0;
    }
    select.fil-opt {
        width: 75px;
    }
    .wrapper{
        height: 100%;
    }
    .h4-button{
        border-radius: 4px;
        padding: 5px;
        font-weight: 600;
        font-size: 14px;
        margin-top: 0;
        margin-bottom: 15px;
        line-height: inherit;
    }
    .bulletin__wrap{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 15px;
        padding-right: 15px;
        -ms-flex-wrap: wrap;
            flex-wrap: wrap;
    }
    .icon__item{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        height: 80px;
        background-color: white;
        color: inherit;
    }
    .icon__item:hover,
    .icon__item:focus{
        color: inherit;
        text-decoration: none;
    }
    .icon__item:hover .icon__img,
    .icon__item:focus .icon__img{
       opacity: 1;
    }
    .icon__item-wrap{
       padding-right: 0;
    }
    .icon__item-wrap:nth-child(n+4){
        margin-top: 15px;
    }
    .icon__img{    
        min-width: 80px;
        width: 80px;
        font-size: 20px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        margin-right: 15px;
        opacity: 0.85;
    }
    .icon__descr{
        padding: 5px 0;
    }
    .icon__descr-title{
        font-size: 17px;
    }
    .purple{    
        background-color: rebeccapurple;
        color: white;
    }
    .pink{    
        background-color: #e56266;
        color: white;
    }
    .orange{    
        background-color: #ea6917;
        color: white;
    }
    .red{    
        background-color: #cb191f;
        color: white;
    }
    .green{    
        background-color: #63b932;
        color: white;
    }
    .black{    
        background-color: #2e2e2e;
        color: white;
    }
    .blue{    
        background-color: #3c8dbc;
        color: white;
    }
    .timeline{
        height: 300px; 
        overflow-y: scroll;  
    }
    .timeline:before{
        content:none;
    }
    .input__primary{
        border: 1px solid transparent;
            display: inline-block;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
    }
    @media screen and (min-width: 768px) {
      .input__primary{
        min-width: 200px;
        } 
    }
    @media screen and (max-width: 991px) {
       .icon__item-wrap {
        margin-top: 15px;
        } 
    }
    @media screen and (max-width:767px) {
       .input__primary{
        margin-bottom: 15px;
        width: 100%;
        } 
        .input__primary + .btn{
        width: 100%;
        }
        .content{
            padding-left: 0;
            padding-right: 0;
        }
    }
</style>
@stop

@section('content_header')
    
@stop

@section('content')
    Admin panel start
    
@stop