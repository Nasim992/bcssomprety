<?php include 'toplayout.php' ?>

<div class="container">
  <div class="card-header">
    <div class="row">
      <div class="col-md-8">
        <h4 class="card-title" style="display: flex"> <i class="fas fa-shopping-bag"></i> &nbsp;সকল ক্যাটাগরি </h4>
      </div>
    </div>
  </div>
  <table class="transaction_table" align="center">
    <tr>
      <th> কোর্সের নাম  </th>
      <th> অনুমোদন অপেক্ষারত </th>
      <th> অনুমোদিত </th>
    </tr>
    <% @categories.each do |category| %>
      <tr>
        <td><%= category.category_name %></td>
        <td>
          <%= link_to user_category_pending_transactions_path(user_id: current_user.id, category_id: category.id) do %>
            <div style="width: 100%">
              <%= category.transactions.where(status: "pending").count %>
            </div>
          <% end %>
         </td>
        <td><%= category.transactions.where(status: "approved").count %></td>
      </tr>
    <% end %>
  </table>
</div>

<?php include 'bottomlayout.php'; ?>