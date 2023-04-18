    @if (isset($projects))
        <h5>生産性合計 : &yen;{{ number_format($total_productivity) }}</h5>
        <h5>コスト合計 : &yen;{{ number_format($sum_gross_profit) }}</h5>
    @endif