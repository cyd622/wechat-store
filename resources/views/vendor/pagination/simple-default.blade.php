<?php

$arrowLeft = '&laquo;';
$arrowRight = '&raquo;';

if($browserType == 'mobile') {
    $arrowLeft = '上一页';
    $arrowRight = '下一页';
}
?>

@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>{!! $arrowLeft !!}</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">{!! $arrowLeft !!}</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">{!! $arrowRight !!}</a></li>
        @else
            <li class="disabled"><span>{!! $arrowRight !!}</span></li>
        @endif
    </ul>
@endif
