/*
Hyperledger Hackathon 2017 @ShangHai
Team ：Hyper Terminator
Works: Consensus of Justice A.I. 
*/

package main

import (
	"errors"
	"fmt"

	"github.com/hyperledger/fabric/core/chaincode/shim"
)

// Chaincode implementation
type HyperTerminator struct {
}

func main() {
	err := shim.Start(new(HyperTerminator))
	if err != nil {
		fmt.Printf("Error starting Simple chaincode: %s", err)
	}
}

// Init
func (t *HyperTerminator) Init(stub shim.ChaincodeStubInterface, function string, args []string) ([]byte, error) {
	if len(args) != 4 {
		return nil, errors.New("Incorrect number of arguments. Expecting 4")
	}

	err1 := stub.PutState("var_word1", []byte(args[0]))
	if err1 != nil {
		return nil, err1
	}

	err2 := stub.PutState("var_word2", []byte(args[1]))
	if err2 != nil {
		return nil, err2
	}

	err3 := stub.PutState("var_word3", []byte(args[2]))
	if err3 != nil {
		return nil, err3
	}
	
	err0 := stub.PutState("var_word0", []byte(args[3]))
	if err0 != nil {
		return nil, err0
	}
	
	return nil, nil
}

// Invoke isur entry point to invoke a chaincode function
func (t *HyperTerminator) Invoke(stub shim.ChaincodeStubInterface, function string, args []string) ([]byte, error) {
	fmt.Println("invoke is running " + function)

	// Handle different functions
	if function == "init" {
		return t.Init(stub, "init", args)
	} else if function == "write" {
		return t.write(stub, args)
	}
	fmt.Println("invoke did not find func: " + function)

	return nil, errors.New("Received unknown function invocation: " + function)
}

// Query is our entry point for queries
func (t *HyperTerminator) Query(stub shim.ChaincodeStubInterface, function string, args []string) ([]byte, error) {
	fmt.Println("query is running " + function)

	// Handle different functions
	if function == "read" { //read a variable
		return t.read(stub, args)
	}
	fmt.Println("query did not find func: " + function)

	return nil, errors.New("Received unknown function query: " + function)
}

// write - invoke function to write key/value pair
func (t *HyperTerminator) write(stub shim.ChaincodeStubInterface, args []string) ([]byte, error) {
	var key1, value1, key2, value2, key3, value3, key0, value0 string
	var err1, err2, err3, err0 error
	fmt.Println("running write()")

	if len(args) != 7 {
		return nil, errors.New("Incorrect number of arguments. Expecting 6. name of the key and value to set")
	}

	key1 = args[0] 
	value1 = args[1]
	key2 = args[2] 
	value2 = args[3]
	key3 = args[4] 
	value3 = args[5]
	
	key0 = args[6]
	
	
	//共识：少数服从多数
	//Consensus: the minority is subordinate to the majority
	if value1 == value2 {
	value0 = value1
	}else if value2 == value3 {
	value0 = value2
	}else if value3 == value1 {
	value0 = value1
	}else{
	value0 = value1  //如果三者均不同 则以1号为准
	// when the majority opinion cannot be formed, the number 1 shall prevail
	}
	
	
	err1 = stub.PutState(key1, []byte(value1)) //write the variable into the chaincode state
	if err1 != nil {
		return nil, err1
	}

	err2 = stub.PutState(key2, []byte(value2)) //write the variable into the chaincode state
	if err2 != nil {
		return nil, err2
	}
	
	err3 = stub.PutState(key3, []byte(value3)) //write the variable into the chaincode state
	if err3 != nil {
		return nil, err3
	}

	err0 = stub.PutState(key0, []byte(value0)) //write the variable into the chaincode state
	if err0 != nil {
		return nil, err0
	}
	
	return nil, nil
	
}

// read
func (t *HyperTerminator) read(stub shim.ChaincodeStubInterface, args []string) ([]byte, error) {
	var key0,jsonResp0 string
	var err0 error

	if len(args) != 1 {
		return nil, errors.New("Incorrect number of arguments. Expecting name of the key to query")
	}

	key0 = args[0]
	valAsbytes0, err0 := stub.GetState(key0)
	if err0 != nil {
		jsonResp0 = "{\"Error\":\"Failed to get state for " + key0  +" \"}"
		return nil, errors.New(jsonResp0)
	}
	
	//var return
	return valAsbytes0, nil
}
