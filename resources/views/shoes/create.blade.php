<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action=" {{route('shoes.store')}}" method='post'>
        @csrf
        <input type="text" name="ean" value="" placeholder="ean">
        <input type="text" name="brand" value="" placeholder="brand">
        <input type="text" name="price" value="" placeholder="price">
        <input type="text" name="typology" value="" placeholder="typology">
        <input type="text" name="genre" value="" placeholder="genre">
        <input type="text" name="year" value="" placeholder="year">
        @method('POST')

        <button type="submit" name="button">
            Save
        </button>
    </form>
    
</body>
</html>