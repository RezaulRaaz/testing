<?php

namespace App\Services;
use Illuminate\Http\Request;

class EventQuery {
    protected $safeParms = [
        'eventName' => ['eq'],
        'location' => ['eq'],
        'age_limit' => ['eq','gt','lt'],
        'event_date' => ['eq'],
        'nid' => ['eq']
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>'
    ];

    protected $columnMap = [
        'eventName' => 'event_name'
    ];

    public function transform(Request $request)
    {
        $eloQuery = [];

        foreach ($this->safeParms as $parm => $operators) {
            $query = $request->query($parm);

            if (!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$parm] ?? $parm;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatorMap($operator), $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }
}