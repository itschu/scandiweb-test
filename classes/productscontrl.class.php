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

        public function deleteProducts($input){
            foreach($input as $col => $id){
                $sql = "UPDATE products set deleted = 'true' WHERE ";
                
                if($col !== "delete"){
                    $sql .= "sn='$col' ";
                }
                $this->delete($sql);
            }
        }

        private function validate(){
            if($this->isEmpty()){
                header("location: ../add-product/?error=all fir=elds are required.");
                exit(); return;
            }

            if($this->checkSku($this->sku)){
                header("location: ../add-product/?error=the sku is not unique.");
                exit(); return;
            }
        }

        private function isEmpty(){
            $result = false;

            if(empty($this->sku) || empty($this->name) ||  empty($this->price) ||  empty($this->type) ||  empty($this->details)){
                $result = true;
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