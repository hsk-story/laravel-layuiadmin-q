<div class="layui-card-body">
    <form class="layui-form" method="post" action="{{ route("navigation.update", ['navigation' => $navigation->id]) }}" id="layer-form">
        @csrf
        <div class="layui-form-item">
            <label class="layui-form-label">名称</label>
            <div class="layui-input-block">
                <input type="text" name="name" required value="{{ $navigation->name }}"  lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">上级菜单ID</label>
            <div class="layui-input-block">
                <input type="text" id="parent_id" lay-filter="parent_id" name="parent_id" required value="{{ $navigation->parent_id }}"  lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">URI</label>
            <div class="layui-input-block">
                <input type="text" name="uri" required value="{{ $navigation->uri }}"  lay-verify="required" placeholder="请输入导航链接" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">关联权限</label>
            <div class="layui-input-block">
                {{--<input type="text" name="permission_name" required value="{{ $navigation->permission_name }}"  lay-verify="required" placeholder="请输入关联权限" autocomplete="off" class="layui-input">--}}
                <select name="permission_name" lay-verify="" lay-search>
                    <option value="">无权限</option>
                    @foreach($permissions as $key=>$permissionList)
                        <optgroup label="{{$key}}">
                            @foreach ($permissionList as $permission)
                                @if($navigation->permission_name == $permission->name)
                                    <option value="{{$permission->name}}" selected>{{$permission->display_name}}</option>
                                @else
                                    <option value="{{$permission->name}}">{{$permission->display_name}}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">导航类型</label>
            <div class="layui-input-block">
{{--                <input type="text" name="type" required value="{{ $navigation->type }}"  lay-verify="required" placeholder="请输入导航类型" autocomplete="off" class="layui-input">--}}
                <select name="type" lay-verify="required">
                    <option value=""></option>
                    {!! admin_enum_option_string("navigation_type", $navigation->type) !!}
                </select>

            </div>
        </div>
        <input type="hidden" name="guard_name" value="admin">
        {{--<div class="layui-form-item">
            <label class="layui-form-label">Guard</label>
            <div class="layui-input-block">
                <select name="guard_name" lay-verify="required">
                    <option value=""></option>
                    {!! admin_enum_option_string("guard_names", $navigation->guard_name) !!}
                </select>
            </div>
        </div>--}}
        <div class="layui-form-item">
            <label class="layui-form-label">icon</label>
            <div class="layui-input-block">
                <input type="text" name="icon" required value="{{ $navigation->icon }}"  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">排序</label>
            <div class="layui-input-block">
                <input type="text" name="sequence" required value="{{ $navigation->sequence }}"  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">禁用状态</label>
            <div class="layui-input-block">
                <select name="is_link" lay-verify="required">
                    <option value="0" @if($navigation->is_link == 0) selected @endif >否</option>
                    <option value="1" @if($navigation->is_link == 1) selected @endif >是</option>
                </select>
            </div>
        </div>
    </form>
</div>