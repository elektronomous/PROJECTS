<?php

namespace App\_18serializeObjectAndSerializeMagic;

class Invoice2 {
    private string $id;
    /* 3~  */
    public function __construct(private float $amount,
                                public string $description,
                                private string $creditCardNumber) 
                                {
        $this->id = uniqueid('Invoice_');
    }
    /* 
        ~ maybe you don't want to serialize the $creditCardNumber when you're serializing the
          object of Invoice, maybe you want to encrypt it when serializeing and then decrypting
          it when unserializing, PHP provide solution
          ~ this class could implement Serializable interface, but because it deprecated on
            this version and next version, we don't use it. instead, we use
          ~ __sleep and __wakeup or __serialize and __unserialize
          
          ~ __sleep is called before the serialization happends, so the __sleep is pre-serialization event that you
            can specify which property do you want to serialize.
            ~ return an array containing the names of the properties that you want to serialize.
            ~ when you serializing the object, you'll serializing the properties that you return
              from this magic method
    */
    public function __sleep(): array
    {
        return ['id', 'amount'];         // => when serializing this object, then serialize those properties
    }

    /*
          ~ __wakeup is called after the object has been unserialized
          ~ when you serialize object, you just serialize the properties of the object, not
            with the dependencies/resources like open database connection, or something like that
            or object that has a lot of dependencies. __wakeup magic method can be used restore those
            connection, restore those dependencies, restore those resources when the object is unserialized
            that may have been lost during the serialization
          4# try using this magic method on _18serializeObjectAndSerializeMagic2.php
        5~ create __serialize magic method
    */
    public function __serialize(): array {
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'creditCardNumber' => base64_encode($this->creditCardNumber),
            /* or you can additional value here */
            'foo' => 'bar'
        ];
    }
    /* 
         ~ after you create this __serialize magic method, you'll see the way the result
           you get, because __serialize replace the magic method of __sleep. the same applies
           when you have __wakeup method and __unserialize method 
         ~ the __unserialize magic method gets called after the object has been unserialize.
           ~ __unserialize accept an argument that the data that's has been serialized and using this data
             you can restore the state of your object using that data, you can reinitialize the properties,
             restore the connections do whatever to be done to reconstruct the object
    */
    public function __unserialize(array $data): void
    {
        /* 7~ recontsruct the object */
        $this->id = $data['id'];
        $this->amount = $data['amount'];
        $this->creditCardNumber = base64_decode($data['creditCardNumber']);
        /* 
            ~ we left out of 'foo' => 'bar' where you can use it as calculation or create some magic properties
              do whatever needs to be done
            8# now after this var_dump the storage where you put the return result from this magic method

        */
        var_dump($data); echo "<br />";
    }
    /* 
        6# now unserialize the object you serialized on serializeObjectAndSerializeMagic2.php
    */

    public static function create(): static {
        return new static(25.22, 'Invoice2','123441234');
    }
    /* 2~ create __clone magic method */
    public function __clone()
    {
        $this->id = uniqid('Invoice_');
    }
    /* 
        3# test this method inside the objectCloningAndCloneMagic.php
    */
}

function uniqueid(string $invoice): string {
    return $invoice . rand(11111, 99999);
}
?>