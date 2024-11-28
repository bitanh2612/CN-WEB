<?php include 'header.php'; ?>

<div class="container">
    <button class="btn btn-add">Add Product</button>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Product 1</td>
                <td>1000 USD</td>
                <td><a href="#" class="btnedit">✎</a></td>
                <td><a href="#" class="btndelete">🗑</a></td>
            </tr>
            <tr>
                <td>Product 2</td>
                <td>2000 USD</td>
                <td><a href="#" class="btnedit">✎</a></td>
                <td><a href="#" class="btndelete">🗑</a></td>
            </tr>
            <tr>
                <td>Product 3</td>
                <td>3000 USD</td>
                <td><a href="#" class="btnedit">✎</a></td>
                <td><a href="#" class="btndelete">🗑</a></td>
            </tr>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>