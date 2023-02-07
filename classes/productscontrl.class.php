<?php

    class ProductsContrl extends Products{
        private $sku;
        private $name;
        private $price;
        private $type;
        private $details;

        public function __construct ($sku, $name, $price, $type, $details){
            $this->sku = $sku;
            $this->name = $name;
            $this->price = $price;
            $this->type = $type;
            $this->details = $details;
        }

        public function createProduct(){
            $this->validate();
            $result = $this->addProduct($this->si($this->sku), $this->si($this->name), $this->si($this->price), $this->si($this->type), $this->si($this->details));
        }

        public function deleteProduct($input){
            foreach($input as $col => $id){
                $sql = "DELETE FROM products WHERE ";
                
                if($col !== "delete"){
                    $sql .= "sn='$col' ";
                }
                $this->delete($sql);
            }
        }

        private function validate(){
            if($this->isEmpty()){
                header("location: ../product.php?error=emptyfields");
                exit(); return;
            }
        }

        private function isEmpty(){
            $result = true;
            if(empty($this->sku) || empty($this->name) ||  empty($this->price) ||  empty($this->type) ||  empty($this->details)){
                $result = true;
            }else{
                $result = false;
            }
            return $result;
        }

        private function si($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
    }