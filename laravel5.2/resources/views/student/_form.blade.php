<form class="form-horizontal" action="" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">姓名</label>

        <div class="col-sm-5">
            <input type="text" name="student[name]"
                   value="{{ isset(old('student')['name']) ? old('student')['name'] : isset($student->name) ? $student->name : "" }}"
                   class="form-control" id="name" placeholder="请输入学生姓名">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{ $errors->first('student.name') }}</p>
        </div>
    </div>
    <div class="form-group">
        <label for="age" class="col-sm-2 control-label">年龄</label>

        <div class="col-sm-5">
            <input type="text" name="student[age]"
                   value="{{ old('student')['age'] or $student->age or "" }}"
                   class="form-control" id="age" placeholder="请输入学生年龄">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{ $errors->first('student.age') }}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">性别</label>

        <div class="col-sm-5">
            @foreach($student->sex() as $key=>$sex)
                <label class="radio-inline">
                    <input type="radio" name="student[sex]"
                           {{ (isset(old('student')['sex']) && old('student')['sex'] == $key) || (isset($student->sex) && $student->sex )== $key ? 'checked' : '' }}
                           value="{{ $key }}"> {{ $sex }}
                </label>
            @endforeach
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{ $errors->first('student.sex') }}</p>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">提交</button>
        </div>
    </div>
</form>