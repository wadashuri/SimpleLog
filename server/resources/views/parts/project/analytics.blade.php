    @if (isset($projects))
        <h5>生産性合計 : &yen;{{ number_format($total_productivity) }}</h5>
        <h5>コスト合計 : &yen;{{ number_format($sum_cost) }}</h5>
    @endif