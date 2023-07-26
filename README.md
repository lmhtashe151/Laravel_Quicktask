Task1
1. Có những cách nào để tạo 1 project Laravel?
Để tạo một dự án Laravel, có một số cách phổ biến sau:
- Sử dụng Composer: 
composer create-project --prefer-dist laravel/laravel project-name
- Sử dụng Laravel Installer:
composer global require laravel/installer
laravel new project-name
- Sử dụng GitHub Template

2. Nêu mục đích chính, ngắn gọn của các thư mục trong dự án
- app: Chứa mã nguồn của ứng dụng Laravel, bao gồm các thư mục Controllers, Models, Providers, ... Đây là nơi bạn viết mã nguồn chính của ứng dụng.
- bootstrap: Chứa tệp app.php để khởi tạo ứng dụng và các tệp khác để cấu hình môi trường khởi đầu.
- config: Chứa các tệp cấu hình của ứng dụng, bao gồm tùy chỉnh các cài đặt.
- database: Chứa các tệp liên quan đến cơ sở dữ liệu, bao gồm migrations (các file tạo cấu trúc DB), seeds (dữ liệu giả mạo), ...
- public: Chứa tệp index.php là điểm khởi đầu của ứng dụng và các tệp tĩnh như hình ảnh, CSS, JavaScript. Thư mục này được truy cập từ bên ngoài và là nơi chỉ thị cho máy chủ web.
- resources: Chứa các tài nguyên không phải mã nguồn như blade views (giao diện), ngôn ngữ, tệp CSS, JavaScript.
- routes: Chứa các tệp định tuyến (route) của ứng dụng, nơi bạn định nghĩa các route và xử lý các request.
- storage: Chứa các file tạm thời, logs, caches và các tệp khác mà Laravel sinh ra trong quá trình hoạt động của ứng dụng.
- tests: Chứa các bài kiểm tra đơn vị và tích hợp của ứng dụng, giúp đảm bảo tính đúng đắn và chất lượng của mã nguồn.
- vendor: Chứa các thư viện của bên thứ ba được cài đặt thông qua Composer.

3. Vòng đời của một request trong Laravel. (Mở rộng)
Vòng đời của một request trong Laravel đi qua nhiều giai đoạn khác nhau để xử lý yêu cầu và phản hồi. Dưới đây là một tóm tắt các giai đoạn quan trọng trong vòng đời của một request:
HTTP Request: Khi một request được gửi đến ứng dụng Laravel, nó được định tuyến tới một hàm xử lý trong tệp routes/web.php hoặc routes/api.php, tùy thuộc vào loại route.
Middleware: Nếu có, các middleware sẽ được thực thi trước khi request đến được xử lý bởi controller. Middleware có thể kiểm tra và can thiệp vào request trước khi nó được xử lý hoặc kiểm tra các điều kiện trước khi cho phép request tiếp tục vào controller.
Controller: Controller xử lý request, thực hiện các hành động (action) và trả về kết quả.
Service Provider: Nếu có, các service provider được kích hoạt để cung cấp các dịch vụ cho ứng dụng.
Model: Trong một số trường hợp, controller giao tiếp với model để thao tác với cơ sở dữ liệu.
Middleware (lần 2): Sau khi controller xử lý request và trả về kết quả, các middleware khác có thể được kích hoạt để xử lý response trước khi nó được gửi về người dùng.
HTTP Response: Cuối cùng, response được trả về cho người dùng thông qua trình duyệt hoặc ứng dụng khách.

-------------------------------------------------------------------------------------------------------------------------------------

Task2

1. Bản chất của Migration:
Migration trong Laravel là cơ chế giúp quản lý và duy trì phiên bản cơ sở dữ liệu của ứng dụng. Nó cho phép bạn tạo, sửa đổi hoặc xóa các bảng và cột trong cơ sở dữ liệu một cách dễ dàng thông qua mã nguồn. Migration lưu trữ các phiên bản của cơ sở dữ liệu trong mã nguồn, điều này giúp đảm bảo rằng các thành viên trong nhóm làm việc trên dự án cùng nhau duy trì cơ sở dữ liệu theo cùng một phiên bản.

2. Để tạo một Migration mới, hãy mở terminal và gõ lệnh sau:
php artisan make:migration create_table_name
- Cách thực hiện migrate/rollback: Migrate: Để thực hiện Migration và cập nhật cơ sở dữ liệu, hãy chạy lệnh sau:
php artisan migrate
- Rollback: Đôi khi bạn cần hủy các thay đổi trong Migration. Để rollback (hủy) Migration, bạn có thể sử dụng lệnh sau:
php artisan migrate:rollback

3. Migration là gì?
- Migration trong Laravel là một công cụ giúp quản lý và duy trì cơ sở dữ liệu của ứng dụng. Nó cho phép bạn định nghĩa các thay đổi cơ sở dữ liệu bằng mã nguồn, giúp duy trì phiên bản cơ sở dữ liệu và cung cấp cơ chế điều chỉnh cơ sở dữ liệu cho các thành viên làm việc trong nhóm.

- Migration trong Laravel có các phiên bản, cho phép bạn dễ dàng thay đổi cấu trúc cơ sở dữ liệu và theo dõi lịch sử các thay đổi đã được thực hiện. Nó cũng giúp đảm bảo rằng cơ sở dữ liệu của ứng dụng được duy trì chính xác khi triển khai ứng dụng từ môi trường phát triển đến môi trường sản xuất.

- Hàm up() và down() trong một class migration dùng để làm gì?
Trong một class migration, bạn sẽ thấy hai phương thức quan trọng là up() và down(). Hai phương thức này được sử dụng để định nghĩa các thay đổi trong cơ sở dữ liệu.
up(): Phương thức up() chứa mã nguồn để thực hiện các thay đổi trong cơ sở dữ liệu. Các thay đổi này bao gồm việc tạo bảng mới, thêm cột, chỉnh sửa cấu trúc cơ sở dữ liệu, v.v. Khi bạn chạy lệnh php artisan migrate, các phương thức up() của các Migration chưa được thực thi sẽ được thực thi để cập nhật cơ sở dữ liệu.
down(): Phương thức down() chứa mã nguồn để hủy các thay đổi đã thực hiện trong phương thức up(). Nó đảm bảo rằng khi bạn chạy lệnh php artisan migrate:rollback, các phương thức down() của các Migration sẽ được thực thi để hủy các thay đổi cơ sở dữ liệu đã thực hiện. Phương thức này giúp đảm bảo quá trình rollback là an toàn và không làm mất dữ liệu quan trọng.

4. Nêu các câu lệnh Migration thông dụng mà bạn biết.
Tạo Migration mới: php artisan make:migration create_table_name
Chạy Migration: php artisan migrate
Rollback Migration: php artisan migrate:rollback
Tạo Model và Migration cùng lúc: php artisan make:model ModelName -m
Tạo Migration cho bảng đã tồn tại: php artisan make:migration add_column_to_table --table=table_name
Rollback nhiều Migration: php artisan migrate:rollback --step=3
Làm mới cơ sở dữ liệu:php artisan migrate:refresh
Tạo Index trong Migration: 
// Tạo index đơn cột
$table->index('column_name');
// Tạo index đa cột
$table->index(['column1', 'column2']);

5. Mass assignment là gì?

- Mass assignment là một phương thức cho phép bạn gán giá trị cho nhiều thuộc tính của một đối tượng cùng một lúc thông qua một mảng dữ liệu. Trong ngữ cảnh của Laravel, nó cho phép bạn cập nhật nhiều trường dữ liệu cùng lúc trong một bản ghi cơ sở dữ liệu mà không cần phải gán giá trị cho từng trường một cách riêng biệt.

6. Cách xử lý Mass assignment trong Laravel:
- Trong Laravel, để sử dụng Mass assignment, bạn cần cấu hình các thuộc tính có thể được gán bằng cách sử dụng thuộc tính fillable hoặc guarded trong Model của bạn.

- fillable: Định nghĩa các thuộc tính của Model có thể được gán dữ liệu thông qua Mass assignment. Các thuộc tính được liệt kê trong mảng fillable sẽ được chấp nhận khi gọi phương thức create() hoặc update() trên Model.

- guarded: Định nghĩa các thuộc tính không được phép gán thông qua Mass assignment. Các thuộc tính được liệt kê trong mảng guarded sẽ bị bỏ qua và không được cập nhật khi gọi phương thức create() hoặc update() trên Model.

7. Tại sao Laravel có cả thuộc tính "fillable" và "guarded"?
- Laravel cung cấp cả thuộc tính fillable và guarded để kiểm soát quyền truy cập vào Mass assignment trong Model của bạn. Sử dụng cả hai thuộc tính này đều có những ưu điểm và tùy thuộc vào tình huống cụ thể mà bạn có thể chọn cách phù hợp.

- Nếu bạn sử dụng fillable, chỉ các thuộc tính được liệt kê trong mảng fillable sẽ được gán giá trị thông qua Mass assignment. Điều này giúp đảm bảo an toàn về mặt bảo mật vì chỉ có các thuộc tính cụ thể được chấp nhận và không cho phép gán dữ liệu vào bất kỳ trường nào.

- Nếu bạn sử dụng guarded, chỉ các thuộc tính không được liệt kê trong mảng guarded sẽ được chấp nhận thông qua Mass assignment. Các thuộc tính khác sẽ được bỏ qua, điều này hữu ích khi bạn muốn chấp nhận tất cả các thuộc tính trừ một số trường cụ thể.

8. Với các thuộc tính nằm trong "blacklist", ta làm như thế nào để thay đổi nó?
- Nếu bạn muốn thay đổi các thuộc tính nằm trong "blacklist" (nằm trong mảng guarded) và cho phép chúng có thể gán giá trị thông qua Mass assignment, bạn có thể sử dụng thuộc tính fillable thay vì guarded.

- Để thay đổi các thuộc tính trong "blacklist", mở tệp Model của bạn và định nghĩa mảng fillable bằng các thuộc tính bạn muốn chấp nhận thông qua Mass assignment. 
VD: protected $fillable = ['attribute1', 'attribute2', ...];

------------------------------------------------------------------------------------------------------------
Task3:
1. Các quan hệ của Laravel và phương thức tương ứng:
a. Quan hệ một-một (One-to-One):
- hasOne: Định nghĩa quan hệ một-một với Model khác. Ví dụ: hasOne('App\Models\Profile').
- belongsTo: Định nghĩa quan hệ một-một ngược lại với Model khác. Ví dụ: belongsTo('App\Models\User').
b. Quan hệ một-nhiều (One-to-Many):
- hasMany: Định nghĩa quan hệ một-nhiều với Model khác. Ví dụ: hasMany('App\Models\Task').
- belongsTo: Định nghĩa quan hệ một-nhiều ngược lại với Model khác. Ví dụ: belongsTo('App\Models\User').
c. Quan hệ nhiều-nhiều (Many-to-Many):
- belongsToMany: Định nghĩa quan hệ nhiều-nhiều thông qua bảng trung gian. Ví dụ: belongsToMany('App\Models\Role').
d. Quan hệ qua một bảng trung gian (Has Many Through):
- hasManyThrough: Định nghĩa quan hệ qua một bảng trung gian. Ví dụ: hasManyThrough('App\Models\Ticket', 'App\Models\Office').
e. Quan hệ đa cấp (Polymorphic):
- morphTo: Định nghĩa quan hệ đa cấp cho phần tử đa cấp. Ví dụ: morphTo().
- morphOne: Định nghĩa quan hệ đa cấp một-một. Ví dụ: morphOne('App\Models\Comment', 'commentable').
- morphMany: Định nghĩa quan hệ đa cấp một-nhiều. Ví dụ: morphMany('App\Models\Comment', 'commentable').
- morphToMany: Định nghĩa quan hệ đa cấp nhiều-nhiều thông qua bảng trung gian. Ví dụ: morphToMany('App\Models\Tag', 'taggable').
- morphedByMany: Định nghĩa quan hệ đa cấp ngược lại với quan hệ morphToMany. Ví dụ: morphedByMany('App\Models\Post', 'taggable').

2. Các cách liên kết 2 đối tượng có quan hệ n-n:
Trong quan hệ nhiều-nhiều (Many-to-Many), có hai cách liên kết 2 đối tượng có quan hệ n-n thông qua bảng trung gian:

Cách 1: Sử dụng phương thức attach() và detach():
// Liên kết 2 đối tượng
$office = Office::find(1);
$user = User::find(1);
$office->users()->attach($user->id);

// Huỷ liên kết giữa 2 đối tượng
$office->users()->detach($user->id);

Cách 2: Sử dụng phương thức sync():
// Liên kết 2 đối tượng (đồng bộ hóa)
$office = Office::find(1);
$usersIds = [1, 2, 3]; // Ids của các User cần liên kết
$office->users()->sync($usersIds);

// Huỷ liên kết giữa 2 đối tượng (đồng bộ hóa)
$office->users()->detach($usersIds);

3. Lấy dữ liệu từ bảng trung gian trong quan hệ n-n:
Khi bạn đã thiết lập quan hệ nhiều-nhiều thông qua bảng trung gian, bạn có thể lấy dữ liệu từ bảng trung gian thông qua phương thức withPivot().
// Truy vấn thông tin của một Office cụ thể kèm theo các thông tin trong bảng trung gian
$office = Office::with('users')->find(1);

// Lấy dữ liệu từ bảng trung gian trong một quan hệ n-n cụ thể
foreach ($office->users as $user) {
    echo "User ID: " . $user->id;
    echo " - Pivot Data: " . $user->pivot->column_name;
}

