<html>
<head>
    <style>
        body
        {
            color:red;
        } 
    </style>
</head>
<body>
    <div>
        <?php
           //  var_dump($_POST);
            $firstname = $_POST['firstname'];
            $lastname  = $_POST['lastname' ];
            $address   = $_POST['add'      ];
            $contact   = $_POST['contact'  ];
            $age       = $_POST['age'      ];
        ?>
        <br>
        Firstname: <?php echo $firstname; ?> <br/>
        Lastname:  <?php echo $lastname;  ?> <br/>
        Address:   <?php echo $address;   ?> <br/>
        Contact:   <?php echo $contact;   ?> <br/>
        Age:       <?php echo $age;       ?> <br/>
    </div>
</body>
</html>