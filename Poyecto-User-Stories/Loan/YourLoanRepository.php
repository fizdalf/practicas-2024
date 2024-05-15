<?php



class LoanBook{
    public function getLoans(): array{
        return [
                ["book_id" => 1, "returned" => false],
                ["book_id" => 2, "returned" => true],
                ["book_id" => 3, "returned" => false]
        ];
    }


    public function isBookOnLoan($bookId, $loans){
        foreach ($loans as $loan){
            if ($loan["book_id"] == $bookId && !$loan["returned"]){
                return true;
            }
        }
        return false;
    }
}